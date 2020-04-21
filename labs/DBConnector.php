<?php 
define('DB_SERVER','localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'btc3205');

class DBConnector{
	public $conn;
	function __construct(){
		$this ->conn=new mysqli(DB_SERVER,DB_USER,DB_PASS) or die ("Error:".mysqli_connect_error());
		mysqli_select_db($this->conn,DB_NAME);
	}
	public function closeDatabase(){
		mysqli_close($this->conn);
	}

}

/*function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "btc3205";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "You have successfully connected to the database!";
    return $conn;
}
	
class DBConnnector{
		public $conn;
		function__construct (){
			$this->conn = msql_connect(DB_SERVER,DB_USER,DB_PASS) OR die ("Error:" .mysql_error());
			mysql_select_db(DB_NAME,$this->conn);
		}
	public function closeDatabase(){
		mysql_close($this->conn);
	}
	}*/
?>