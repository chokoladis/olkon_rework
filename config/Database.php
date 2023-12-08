<?

namespace config;

class Database {

    protected $connect;

    function __construct(){

        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $db = $_ENV['DB_NAME'];
        $password = $_ENV['DB_PASSWORD'];
        $charset = $_ENV['DB_CHARSET'];
        // $this->connect = new \PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);
        // session_start();

        // $this->connect = mysqli_connect('localhost', 'root', '', 'olkon');
        // session_start();
    }

    public function sendQuery($query){
        var_dump($query);
        // return mysqli_query($this->connect,$query);
        return $this->prepare($query);        
    }
}

?>