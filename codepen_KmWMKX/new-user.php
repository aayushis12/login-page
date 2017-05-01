<?php require 'database.php';


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST["username"];
$password = $_POST["pwd"];
$phone=$_POST["phone"]; 
$sql = "INSERT INTO login (Username, Password,Phone) VALUES ('$username','$password','$phone')";
$conn->query($sql);
$conn->close();
?>