<?include 'db.php';ini_set('display_errors','on');
error_reporting('E_ALL');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <title>Autoservice.org/clients</title>
</head>
<body>
<header class="header">
    <div class="container">
        <?
        if (isset($_SESSION['logged_user'])) { 
            echo '
            <div class="success">
                <span>Вы зашли под логином <b>'.$_SESSION["logged_user"].'</b> </span>
                <div class="links">
                    <a href="logout.php">Выйти</a>
                </div>
            </div>';  
        }	
        ?>
        <div class="list_contacts">
        <ul>
            <li>
                <h4>Фамилия</h4>
                <h4>Имя</h4>
                <h4>Отчество</h4>
                <h4>Дата занесения</h4>
                <h4>Номер машины</h4>
            </li>
            <?
                $i=0;
                $query2 =  mysqli_query($connect,"SELECT * FROM `clients`");
                $n = mysqli_num_rows($query2);
                if (isset($_SESSION['logged_user'])) { 
                    if ($_SESSION['logged_user']=="admin") { 
                        echo '<form action="#" method="POST" id="main_form">';
                        while($r = mysqli_fetch_array($query2)){
                            echo "
                            <li>
                                <input type='text' name='fname' id='fname-$r[id]' value='{$r[fname]}' >
                                <input type='text' name='sname' id='sname-$r[id]' value='{$r[sname]}' >
                                <input type='text' name='tname' id='tname-$r[id]' value='{$r[tname]}' >
                                <input type='text' name='date_record' id='date_record-$r[id]' value='{$r[date_record]}' >
                                <input type='text' name='num_car' id='num_car-$r[id]' value='{$r[num_car]}' >
                                <input value='{$r[id]}' type='hidden' name='id_user'>
                                <button type='submit' name='submit_upd' id='submit_upd'>
                                    <img src='img/upd.png'>
                                </button>
                                "?><a class="btn del" href='?del=<?=$r['id']?>'><img src="img/delete.png" alt="Удалить"></a><? echo "
                            </li>
                            ";
                            $i++;   
                        }
                        echo "
                        </form >
                        <form action='#' method='POST' id='add_form' class='add_form'>
                            <div class='add_item'>
                                <input type='text' name='fname_add' id='fname_add' placeholder='Фамилия' >
                                <input type='text' name='sname_add' id='sname_add' placeholder='Имя' >
                                <input type='text' name='tname_add' id='tname_add' placeholder='Отчество' >
                                <input type='date' name='date_record_add' id='date_record_add' placeholder='Дата занесения' >
                                <input type='text' name='num_car_add' id='num_car_add' placeholder='Номер машины' >

                            </div>
                            <input type='submit' name='submit_add' id='submit_add' value='Отправить' >
                        </form>
                        <div class='controls'>
                            <a href='#add_form' class='btn add'>Добавить запись</a>
                        </div>";
                        if (isset($_POST['submit_add'])) {
                            $fname_add=$_POST['fname_add'];
                            $sname_add=$_POST['sname_add'];
                            $tname_add=$_POST['tname_add'];
                            $date_record_add=$_POST['date_record_add'];
                            $num_car_add=$_POST['num_car_add'];
                            $query_add = mysqli_query($connect,"INSERT INTO `clients` VALUES(null,'$fname_add','$sname_add','$tname_add','$date_record_add','$num_car_add')");
                            echo "
                            <div class='msg_box'>
                                <h5>Системное сообщение</h5>
                                <h3>Запись добавлена на сервер</h3>
                            </div>
                            ";
                        }
                        if (isset($_GET['del'])) {
                            $id=$_GET['del'];
                            $query3 = mysqli_query($connect,"DELETE FROM `clients` WHERE id=$id");
                            echo "
                            <div class='msg_box'>
                                <h5>Системное сообщение</h5>
                                <h3>Запись была удалена</h3>
                            </div>
                            ";
                        }
                        if (isset($_POST['submit_upd'])) {
                            $id2=$_POST['id_user'];
                            $fname=$_POST['fname'];
                            $sname=$_POST['sname'];
                            $tname=$_POST['tname'];
                            $date_record=$_POST['date_record'];
                            $num_car=$_POST['num_car'];
                            
                            $arr=array();
                            $arr[]="fname='$fname'";
                            $arr[]="sname='$sname'";
                            $arr[]="tname='$tname'";
                            $arr[]="date_record='$date_record'";
                            $arr[]="num_car='$num_car'";

                            $set=implode(',',$arr);
                            $query4 = "UPDATE `clients` SET $set WHERE id = '$id2'";
                            
                            if ($connect->query($query4) === TRUE) {
                                    echo "
                                    <div class='msg_box'>
                                        <h5>Системное сообщение</h5>
                                        <h3>Запись была обновлена</h3>
                                    </div>
                                    ";
                            } else {
                                echo "
                                    <div class='msg_box'>
                                        <h5>Системное сообщение</h5>
                                        <h3>Ошибка при обновлении :".$conn->error."</h3>
                                    </div>
                                    ";
                            }
                        }
                        
                    }
                    else {
                        while($r = mysqli_fetch_array($query2)){
                            echo "
                            <li>
                                <p>{$r[fname]} </p>
                                <p>{$r[sname]}</p>
                                <p>{$r[tname]} </p>
                                <p>{$r[date_record]}</p>
                                <p>{$r[num_car]}</p>
                            </li>
                            ";
                            $i++;   
                        }
                    }	
                }	            
            ?>
        </ul>
        </div>
    </div>
</header>
<script src="js/main.js"></script>
</body>
</html>