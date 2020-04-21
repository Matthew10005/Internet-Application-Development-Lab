<?<?php 
include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector;

if(isset($_POST['btn-save'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$City = $_POST['city_name'];
	$user = new User($first_name,$last_name,$City);
	$res = $user->save();

	if ($res) {
		echo "Save operation was succesful";
	} else {
		echo "An error occured";
	}
}
?>
<html>
	<head>
		<title> Lab 1 </title>
	</head>
<body>
	<form method = "post">
		<table align="centre">
			<tr>
				<td><input type="text" name="first_name" required placeholder="First Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" placeholder="Last Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="city_name" placeholder="City"></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
			</tr>
		</table>
	</form>
</body>
</html>
