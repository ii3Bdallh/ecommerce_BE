<?php

include "../../connect.php";


$email      = filterRequest("email");
$username   = filterRequest("username");
$password   = filterRequestpassowrd("password");
$phone      = filterRequest("phone");
$verfiycode = rand(10000, 99999);



$stmt = $con->prepare("SELECT * FROM admin WHERE admin_email = ? OR admin_phone = ?");
$stmt->execute(array($email, $phone));


$count = $stmt->rowCount();
if ($count > 0) {
    printFaillure("phone or email arleady exsit");
} else {
    $data = array(
        "admin_name"       => $username,
        "admin_email"      => $email,
        "admin_phone"      => $phone,
        "admin_password"   => $password,
        "admin_verifycode" => $verfiycode,
    );
    sendMail($verfiycode);
    insertData("admin", $data);
}
