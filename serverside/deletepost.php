<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "LoginSystem";
	$tbl_name = "posts";

	$postID = $_POST['postID'];
	$connect = mysqli_connect($host, $username, $password, $db_name)or die("Cannot Connect!");
	$deleteQuery = "DELETE FROM $tbl_name WHERE postID = '$postID'";


	//DELETING THE POST
	mysqli_query($connect, $deleteQuery);

	//Subtracting one from all of the other postIDs
	$minusOne = "UPDATE posts
				SET postID = postID - 1
				WHERE postID > '$postID'";

	mysqli_query($connect, $minusOne);
?>