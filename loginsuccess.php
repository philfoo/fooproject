<?php
	session_start();
	if (!isset($_SESSION["username"])){
		header("location: login.html");
	}
?>

<html>
	<body>
	I love you.
	</body>	
</html>