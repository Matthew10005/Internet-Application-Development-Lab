<?php

 include "Crud.php";
 include "Authenticator.php";
 include_once "DBConnector.php";
 $connect = new DBConnector;

 class User implements Crud,Authenticator{
 	private $user_id;
 	private $first_name;
 	private $last_name;
 	private $city_name;
 	private $username;
 	private $password;

function __construct($first_name,$last_name,$city_name,$username,$password){
 		$this->first_name = $first_name;
 		$this->last_name = $last_name;
 		$this->city_name = $city_name;
 		$this->username = $username;
 		$this->password = $password;
 	}

public static function create (){
 	$instance = new self();
 	return $instance;
 }

public function setUsername($username){
	$this->username = $username;
}

public function getUsername(){
	return $this->username;
}

public function setPassword($password){
	$this->password = $password;
}

public function getPassword (){
	return $this->password;
}

public function setUserId ($user_id){
	$this->user_id = $user_id;}

public function getUserId(){
	return $this->$user_id;
}

public function save($conn){
        $firstName = $this->first_name;
        $lastName = $this->last_name;
        $cityName = $this->city_name;
        $userName = $this->username;
        $this -> hashPassword();
        $passWord = $this->password;

       $result = mysqli_query($conn,"INSERT INTO `user`(`first_name`, `last_name`, `user_city`,`username`,`password`) VALUES ('$firstName','$lastName','$cityName','$userName','$passWord')") or ("Error ".mysqli_error());
            return $result;
        echo "Record Added Successfully";
        }


public function readAll($conn){

	$result = mysqli_query($conn,"SELECT * FROM user") or die ("Error" . mysqli_error());
		return $result;

	 }
	  public function readUnique(){
	 	return null;
	 } public function search(){
	 	return null;
	 }
	  public function update(){
	 	return null;
	 }
	  public function removeOne(){
	 	return null;
	 }
	  public function removeAll(){
	 	return null;
	 }
	 public function validateForm(){
	 	$fn = $this->first_name;
	 	$ln = $this->last_name;
	 	$city = $this->city_name;
	 	if($fn == "" || $ln == "" || $city == ""){
	 		return false;
	 	}
	 	return true;
	 }
	 public function createFormErrorSessions(){
	 	session_start();
	 	$_SESSION['form_errors'] = "All fields are required";
	 }
	 public function hashPassword(){
	 	$this->password = password_hash($this->password,PASSWORD_DEFAULT);
	 }
	 public function isPasswordCorrect(){
	 	$conn = DBConnector;
	 	$found = false;
	 	$result = msqli_query($conn,"SELECT * FROM user") or die ("Error" . mysqli_error());

	 	while ($row = mysqli_fetch_array($result)){
	 		if (password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username']){
	 			$found = true;
	 		}
	 	$conn->closedDatabase();
	 	return $found;
	 	}
	 }

	public function login (){
	 	if ($this->isPasswordCorrect()){
	 		header("Location:private_page.php");
	 	}
	 }
	 public function createUserSession(){
	 	session_start();
	 	$_SESSION['username'] = $this->getUsername();
	 }
	 public function logout(){
	 	session_start();
	 	unset($_SESSION['username']);
	 	session_destroy();
	 	header("Location:lab1.php");
	}
}


?>