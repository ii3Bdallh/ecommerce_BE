<?php


include "../connect.php";
$table = "address";
$addressid = filterRequest("addressid");
$city   = filterRequest("city");
$street = filterRequest("street");
$long   = filterRequest("long");
$lat    = filterRequest("lat");
$phone  = filterRequest("phone");
$name  = filterRequest("name");


$data = array(
    "address_city" => $city,
    "address_street" => $street,
    "address_long" => $long,
    "address_city" => $lat,
    "address_phone" => $phone,
    "address_name" => $name,
);
updateData($table, $data , "address_id = $addressid");
