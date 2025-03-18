<?php


include "../connect.php";

$userid = filterRequest("usersid");
$itemid = filterRequest("itemsid");

$count =  getDAta("cart" , "cart_itemsid  = $itemid AND cart_usersid = $userid AND cart_orders = 0 " , null,  false);

$data = array(
    "cart_usersid" => $userid  ,
    "cart_itemsid" => $itemid  , 
);
insertData("cart" , $data);