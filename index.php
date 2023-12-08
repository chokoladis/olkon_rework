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
                if (isset($_SESSION['logged_user'])) { 
                    echo '';   
                }	
                else {
                    echo '
                    <span>Вам необходимо залогиниться.</span>
                    <form action="#" method="POST">
                        <input type="text" name="login" id="login" placeholder="Логин">
                        <input type="password" name="password" id="password" placeholder="Пароль">
                        <input type="submit" name="submit" id="submit" value="Войти">
                    </form>
                    ';                               
                }
                $data = $_POST;
                if(isset($data['submit'])) {      
                    $login = $data['login'];              
                    $password = $data['password'];
                    $query = mysqli_query($connect,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'"); 
                    $n = mysqli_num_rows($query);
                    if ($n==1){
                        while ($row = mysqli_fetch_assoc($query)) {
                            $_SESSION['logged_user'] = $login;
                        };     
                    } else {
                        echo "<div class='error'>Пароль или логин введен неверно</div> ";
                    }
                }
                if (isset($_SESSION['logged_user'])) { 
                    echo '
                    <div class="success">
                        <span>Вы зашли под логином <b>'.$_SESSION["logged_user"].'</b> </span>
                        <div class="links">
                            <a href="clients.php">Клиенты</a>
                            <a href="logout.php">Выйти</a>
                        </div>
                    </div>';   
                }	
            ?>
            </div>
            
            
        </div>
    </header>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';
?>