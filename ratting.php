<?php

include "connect.php";

$ordersid = filterRequest("ordersid");
$rating = filterRequest("rating");
$comment = filterRequest("comment");
$data = array(
    "orders_rating" => $rating ,
    "orders_noterating" => $comment
);

updateData("orders" , $data , "orders_id  = $ordersid");