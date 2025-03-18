<?php

include "../../../connect.php";

$email = filterRequest("email");
$password = filterRequestpassowrd("password");
$data = array("delivery_password" => $password);
updateData("delivery", $data, "delivery_email = '$email'");
