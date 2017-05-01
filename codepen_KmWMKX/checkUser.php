<?php require 'database.php';
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$user_name=$_POST['user_name'];
$password=$_POST['pwd'];
#echo "PHP:";
$sql="Select * from login where Username='$user_name' and Password='$password'";
$result=$conn->query($sql);
$count=$result->num_rows;
echo($count);

 ?>