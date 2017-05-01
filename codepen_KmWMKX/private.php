<?php
echo"Hello";
session_start();
#$_SESSION["member_id"] = "";
session_destroy();
#header("Location: ./");
?>