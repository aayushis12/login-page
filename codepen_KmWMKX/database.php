<?php
$conn=mysqli_connect('localhost','root','','testdb');
$conn->set_charset("utf8");
if(mysqli_connect_errno($conn)){
	echo 'failed to connect';
}
?>