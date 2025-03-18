<?php

include "../connect.php";

$ordersid = filterRequest("id");

getAllData("ordersdetailsview" , "orders_id = $ordersid" );