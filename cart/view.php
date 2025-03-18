<?php

include "../connect.php";
$usersid =  filterRequest("usersid");

$data = getAllData("cartview", "cart_usersid=$usersid AND cart_orders =0 ", null, false);

$stmt = $con->prepare("SELECT SUM(itemsprice) AS totalprice , SUM(countitems) AS totalitem  FROM cartview
WHERE  cartview.cart_usersid = $usersid
GROUP BY cart_usersid");

$stmt->execute();
$catacountprice = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode(array("status" => "success", "datacart" => $data, "countprice" => $catacountprice));
