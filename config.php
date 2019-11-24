<?php
class Database{

mysql://bf7c7ff3d38152:38c4dba3@us-cdbr-iron-east-05.cleardb.net/heroku_1ba2fa6c7c2d2b6?reconnect=true
    // specify your own database credentials
    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db_name = "heroku_1ba2fa6c7c2d2b6";
    private $username = "bf7c7ff3d38152";
    private $password = "38c4dba3";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
