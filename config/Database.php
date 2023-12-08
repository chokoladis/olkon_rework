<?

namespace config;

class Database {

    private $connect;

    function __construct(){

        $this->connect = mysqli_connect('localhost', 'root', '', 'olkon');
        session_start();
    }
}

?>