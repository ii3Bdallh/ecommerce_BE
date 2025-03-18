<?php

include "../connect.php";


$email      = filterRequest("email");
$username   = filterRequest("username");
$password   = filterRequestpassowrd("password");
$phone      = filterRequest("phone");
$verfiycode = rand(10000, 99999);



$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
$stmt->execute(array($email, $phone));


$count = $stmt->rowCount();
if ($count > 0) {
    printFaillure("phone or email arleady exsit");
} else {
    $data = array(
        "users_name"       => $username,
        "users_email"      => $email,
        "users_phone"      => $phone,
        "users_password"   => $password,
        "users_verfiycode" => $verfiycode,
    );
    sendMail($verfiycode);
    insertData("users", $data);
}
