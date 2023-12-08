<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title><?=$builder->titlePage?></title>
    <?php
        foreach ($builder->assetsHead  as $asset) {
            echo $asset;
        }
    ?>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="message">  
                <?
                    if (!isset($_SESSION['logged_user'])) { 
                        ?>
                        <span>Вам необходимо войти.</span>
                        <form method="POST" id="auth">
                            <input type="text" name="login" id="login" placeholder="Логин">
                            <input type="password" name="password" id="password" placeholder="Пароль">
                            <input type="submit" name="submit" id="submit" value="Войти">
                        </form>
                        <?
                    } else {
                        ?>
                        <span>Вы зашли под логином <b><?=$_SESSION['logged_user']?></b> </span>
                        <div class="links">
                            <a href="clients.php">Клиенты</a>
                            <a href="logout.php">Выйти</a>
                        </div>
                        <?
                    }
                ?>
            </div>
            <div class="success d-none"></div>
            <div class='error d-none'></div>
        </div>
    </header>