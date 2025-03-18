<?php

include "../../connect.php";


$email      = filterRequest("email");
$password   = filterRequestpassowrd("password");

// $stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = ? AND delivery_password = ? AND delivery_approve= 1");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();

// result($count);
getDAta("delivery" , "delivery_email = ? AND delivery_password = ?" ,array($email , $password) );