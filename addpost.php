<?php
	//Get number of posts in database
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "LoginSystem";
	$tbl_name = "posts";

	mysql_connect($host, $username, $password) or die("Cannot Connect!");
	mysql_select_db($db_name) or die("Cannot select Database");

	$sql = "SELECT *FROM $tbl_name";

	//Creating post ID - simply the number of rows
	$id = mysql_num_rows(mysql_query($sql));

	//Get title and post from AJAX
	$title = $_POST['title'];
	$content = $_POST['postcontent'];
	$date = $_POST['date'];

	//Add the post to SQL table
	$addPostQuery = "INSERT INTO $tbl_name(postID, title, content, postDate) VALUES('$id', '$title', '$content', '$date')";
	mysql_query($addPostQuery);
?>
