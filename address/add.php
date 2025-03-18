<?php


include "../connect.php";
$table = "address";
$userid = filterRequest("usersid");
$city   = filterRequest("city");
$street = filterRequest("street");
$long   = filterRequest("long");
$lat    = filterRequest("lat");
$phone  = filterRequest("phone");
$name  = filterRequest("name");
$note  = filterRequest("note");
$home  = filterRequest("home");
$floor  = filterRequest("floor");


$data = array(
    "address_usersid" => $userid,
    "address_city" => $city,
    "address_street" => $street,
    "address_long" => $long,
    "address_lat" => $lat,
    "address_phone" => $phone,
    "address_name" => $name,
    "address_note"   => $note ,
    "address_home" => $home,
    "address_floor" => $floor,
);
insertData($table, $data);
