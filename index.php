<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'].'/include/precompilate.php';

// $builder->addAssetsHead()
$builder->setTitlePage('Autoservice.org');

require_once $_SERVER['DOCUMENT_ROOT'].'/include/header.php';
?>
    <header class="header">
        <div class="container">
            <div class="message">  
                <?
                    if (!isset($_SESSION['auth_user'])) { 
                        ?>
                        <span>Вам необходимо войти.</span>
                        <form method="POST" id="auth">
                            <input type="text" name="login" id="login" placeholder="Логин">
                            <input type="password" name="password" id="password" placeholder="Пароль">
                            <input type="submit" name="submit" id="submit" value="Войти">
                        </form>
                        <?
                    }
                ?>
            </div>
        </div>
    </header>
<?php
    $builder->setAssetsFooter(['<script src="/js/main.js"></script>']);

    require_once $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';
?>