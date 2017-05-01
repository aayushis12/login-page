<?php require 'database.php';
session_start();
if(!empty($_POST["login"])) {
	#$conn = mysqli_connect("localhost", "root", "", "blog_samples");
	$sql = "Select * from login where Username = '" . $_POST["member_name"] . "' and Password = '" . ($_POST["member_password"]) . "'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
    if($_POST["remember"]==1) {
        setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
        $_COOKIE['member_login'] = $_POST['member_login'];      // This is new
        setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
        $_COOKIE['member_password'] = $_POST['member_password'];        // This is new
    } else {
        if(isset($_COOKIE["member_login"])) {
            setcookie ("member_login","");
            $_COOKIE['member_login'] = '';      // This is new
        }
        if(isset($_COOKIE["member_password"])) {
            setcookie ("member_password","");
            $_COOKIE['member_password'] = '';       // This is new
        }
    }
    header("location:private.php");
}
}
?>	


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>A Pen by  aayushi</title>
  
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container-fluid">
 <div class="form-body-login col-md-6 col-xs-6">
 
   <form class="Login" method="post" action="private.php">
     <div class="row buttons">
       <div type="submit" class="col-md-6 col-xs-6 login">Login</div>
       <div type="submit" class="col-md-6 col-xs-6 sign_up">Sign up</div>
     </div>
     <div class="row logo">
     <img src="https://s-media-cache-ak0.pinimg.com/736x/97/fb/9c/97fb9c86363945aa3848bf483df94fe9.jpg" class="col-md-10 col-xs-10"/>
     </div>
     <div class="login_body">
       <div class="row user_name">
         <i class="fa fa-user fa-2x col-md-1 col-xs-1" aria-hidden="true"></i>
         <input type="text" class="col-md-10 col-xs-10 username" id="username_login" placeholder="abc@xyz.com" name="member_name" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
       </div>
     <div>
       <span id="name_err">Hii there</span>
     </div>
     <div class="row pwd">
       <i class="fa fa-key fa-2x col-md-1 col-xs-1" aria-hidden="true"></i>
     <input type="password" class="col-md-10 col-xs-10 password" id="password_login" placeholder="Password" name="member_password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"/>
     </div>
      <div>
       <span id="password_err">Hii there</span>
        </div>
        <div class="row remember col-md-11 col-xs-11">
        <label><input type="checkbox" name="autologin" id="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>/> Remember Me </label>
        </div>
        <div class="row col-md-11 col-xs-11">
          <button type="submit" id="button" name="login">Login</button>
        </div>
     </div>
     <div class="form-body-signup">
     <div class="row username_signup">
     <input type="text" id="username_signup" class="col-md-10" placeholder="Enter user name"/>
     </div>
       <div class="row password_signup">
         <input type="password" id="password_signup" class="col-md-10 col-xs-10" placeholder="Enter password here" />
       </div>
       <div class="row phone">
         <input type="text" id="phone" class="col-md-10 col-xs-10" placeholder="enter phone number" />
       </div>
       
     <div class="row signup_button">
       <button type="submit" id="check">Create New User</button>
     </div>
       <div class="row confirm">
         <span>Confirm email</span>
       </div>
</div>
   </form>
  
   
</div>   
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
