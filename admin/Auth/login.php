<?php

include "../../connect.php";


$email      = filterRequest("email");
$password   = filterRequestpassowrd("password");

// $stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = ? AND admin_password = ? AND admin_approve= 1");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();

// result($count);
getDAta("admin" , "admin_email = ? AND admin_password = ?" ,array($email , $password) );