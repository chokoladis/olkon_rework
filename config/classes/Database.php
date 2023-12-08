<?
namespace Main;

class Database {

    protected $connect;

    function __construct(){

        require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

        $host = $config['DB_HOST'];
        $user = $config['DB_USER'];
        $db = $config['DB_NAME'];
        $password = $config['DB_PASSWORD'];
        $charset = $config['DB_CHARSET'];
        $this->connect = new \PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);
        // $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        session_start();

        // $this->connect = mysqli_connect('localhost', 'root', '', 'olkon');
        // session_start();
    }

    public function getConnection(){
        return $this->connect;
    }

    public function sendQuery($query){
        var_dump($query);
        // return mysqli_query($this->connect,$query);
        return $this->prepare($query);        
    }
}

?>