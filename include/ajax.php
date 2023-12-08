<?

require_once $_SERVER['DOCUMENT_ROOT'].'/config/main.php';

if (!$_GET['action'])
    return false;


$login = addslashes($_POST['login']);
$password = addslashes($_POST['password']);

$query = $db->getConnection()->prepare("SELECT * FROM `users` WHERE `login` = :login AND `password`= :password" );
$query->execute(['login' => $login, 'password' => $password]);
$resUser = $query->fetch(PDO::FETCH_ASSOC);

if (!empty($resUser)){
    
    session_start();
    $_SESSION['logged_user'] = $resUser['login'];

    $response = [
        'success' => true,
    ];

} else {
    $response = [
        'success' => false,
        'error' => 'Пароль или логин введен неверно'
    ];
}

echo json_encode($response, true);
