<?

require_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

// var_dump($_SERVER);
// var_dump($_ENV);
var_dump(getenv());

$data = $_POST;

$login = $data['login'];
$password = $data['password'];

// $query = $db->sendQuery("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'");
// $query = $db->sendQuery("SELECT * FROM `category` WHERE `id` = :id", );
// $query = $db->prepare("SELECT * FROM `users` WHERE `login` = :login AND `password`= :password" );
// $query->execute(array('login' => $login, 'password' => $password));
// $array = $query->fetch(PDO::FETCH_ASSOC);

// var_dump($array);
// $sth = $dbh->prepare("");
// $sth->execute(array('id' => '21'));
// $array = $sth->fetch(PDO::FETCH_ASSOC);


// $n = mysqli_num_rows($query);
// var_dump($query);
// if ($n==1){
//     while ($row = mysqli_fetch_assoc($query)) {
//         var_dump($row);
//         $_SESSION['logged_user'] = $login;
//     };     
// } else {
//     echo "<div class='error'>Пароль или логин введен неверно</div> ";
// }