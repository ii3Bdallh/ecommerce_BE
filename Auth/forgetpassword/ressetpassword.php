<?php

include "../../connect.php";

$email = filterRequest("email");
$password = filterRequestpassowrd("password");
$data = array("users_password" => $password);
updateData("users", $data, "users_email = '$email'");
