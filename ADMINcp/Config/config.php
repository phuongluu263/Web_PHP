<?php
	$mysqli = new mysqli("localhost","root","root","web_lk_sql");

	// Check connection
	if ($mysqli->connect_error)
	{
	  echo "Kết Nối MySQLi Lỗi: " . $mysqli->connect_error;
	  exit();
	}
?>