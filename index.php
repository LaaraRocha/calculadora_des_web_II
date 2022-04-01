<?php
session_start();

if (isset($_SESSION['resultado'])) {
    session_unset();
}

if (isset($_POST['limpar'])) {
    session_unset();
}

$_SESSION['visor'] = '';


if (isset($_POST['valor'])) {
    if (!isset($_SESSION['valor1'])) {
        $_SESSION['valor1'] = $_POST['valor'];
        $_SESSION['visor'] = strval($_SESSION['valor1']);
    } else if (isset($_SESSION['valor1']) && isset($_SESSION['operador'])) {
        $_SESSION['valor2'] = $_POST['valor'];
        $_SESSION['visor'] = strval($_SESSION['valor2']);
    }

    if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
        $_SESSION['valores'] = strval($_SESSION['valor1']) . ' ' .  strval($_SESSION['valor2']);
    }
}

if (isset($_POST['operador'])) {
    $_SESSION['operador'] = $_POST['operador'];
}

if (isset($_POST['finalizar'])) {
    switch ($_SESSION['operador']) {
        case 'x':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['resultado'] = $_SESSION['valor1'] * $_SESSION['valor2'];
            }
            break;
        case '+':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['resultado'] = $_SESSION['valor1'] + $_SESSION['valor2'];
            }
            break;
        case '-':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['resultado'] = $_SESSION['valor1'] - $_SESSION['valor2'];
            }
            break;
        case '/':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['resultado'] = $_SESSION['valor1'] / $_SESSION['valor2'];
            }
            break;
        default:
            echo 'clique um operador valido';
            break;
    }
    $_SESSION['visor'] = strval($_SESSION['resultado']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div>
    <form method="post">
    <header id="tela"><?php
            echo $_SESSION['visor'];
        ?></header>
    <table>

        <tbody>
        <tr class="pink">
            <td><input type="submit" name="limpar" value="AC"</td>
            <td><input type="submit" name="operador" value="/"</td>
        </tr>
        <tr class="pink">
            <td><input type="submit" name="operador" value="+"</td>
            <td><input type="submit" name="operador" value="-"</td>
            <td><input type="submit" name="operador" value="x"</td>
        </tr>
        <tr class="black">
            <td><input type="submit" name="valor" value="7"</td>
            <td><input type="submit" name="valor" value="8"</td>
            <td><input type="submit" name="valor" value="9"</td>
        </tr>
        <tr class="black">
            <td><input type="submit" name="valor" value="4"</td>
            <td><input type="submit" name="valor" value="5"</td>
            <td><input type="submit" name="valor" value="6"</td>
        </tr>
        <tr class="black">
            <td><input type="submit" name="valor" value="1"</td>
            <td><input type="submit" name="valor" value="2"</td>
            <td><input type="submit" name="valor" value="3"</td>
        </tr>
        <tr class="black">
            <td><input type="submit" name="valor" value="."</td>
            <td><input type="submit" name="valor" value="0"</td>
            <td><input type="submit" name="finalizar" value="="</td>
        </tr>
        </tbody>
    </table>
    </form>
</div>
</body>
</html>