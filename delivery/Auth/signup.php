<?php

include "../../connect.php";


$email      = filterRequest("email");
$username   = filterRequest("username");
$password   = filterRequestpassowrd("password");
$phone      = filterRequest("phone");
$verfiycode = rand(10000, 99999);



$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = ? OR delivery_phone = ?");
$stmt->execute(array($email, $phone));


$count = $stmt->rowCount();
if ($count > 0) {
    printFaillure("phone or email arleady exsit");
} else {
    $data = array(
        "delivery_name"       => $username,
        "delivery_email"      => $email,
        "delivery_phone"      => $phone,
        "delivery_password"   => $password,
        "delivery_verifycode" => $verfiycode,
    );
    sendMail($verfiycode);
    insertData("delivery", $data);
}
