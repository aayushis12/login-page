<?php require 'database.php';
error_reporting(E_ALL ^ E_NOTICE);

session_start();
if(!empty($_POST["login"])) {
	#$conn = mysqli_connect("localhost", "root", "", "blog_samples");
	$sql = "Select * from login where Username = '" . $_POST["member_name"] . "' and Password = '" . ($_POST["member_password"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
    if($_POST["remember"]=="on") {
        setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
        #setcookie($_POST["remember"],1);
		
		header("location:private.php");
    }
    
}
}
?>	
