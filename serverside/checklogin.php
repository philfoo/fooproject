<?php
	//$host = "fdb13.biz.nf";
	//$username = "1764941_login";
	//$password = "pineapple516";
	//$db_name = "1764941_login";
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "LoginSystem";
	$tbl_name = "Members";

	//Connect to server
	mysql_connect($host, $username, $password)or die("Cannot Connect!");
	mysql_select_db($db_name)or die("Cannot select Database");

	//TODO: LEARN ABOUT MYSQL INJECTION, MYSQL_CONNECT, ETC

	//Get username and password from form
	$my_username = $_POST['myusername'];
	$my_password = $_POST['mypassword'];

	$sql = "SELECT *FROM $tbl_name WHERE USERNAME = '$my_username' AND PASSWORD = '$my_password'";
	
	$result = mysql_query($sql);

	$count = mysql_num_rows($result);

	if ($count == 1){
		session_start();
		$_SESSION["username"] = $my_username;
		$_SESSION["password"] = $my_password;
		//$parent = dirname($_SERVER['REQUEST_URI']);
		header("Location: ../index.php");
	}
	else{
		echo("Login unsuccessful.");
	}
?>