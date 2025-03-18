<?php


include "../connect.php";
$table = "orders";
$userid = filterRequest("usersid");
$addresid  = filterRequest("addresid");
$orderstype = filterRequest("orderstype");
$pricedelivery   = filterRequest("pricedelivery");
$orderprice    = filterRequest("orderprice");
$couponid  = filterRequest("couponid");
$coupondiscount = filterRequest("coupondiscount");
$paymantmethod = filterRequest("paymantmethod");
// Check Coupon
if ($orderstype == "1") {
    $pricedelivery = 0;
}
$totalpprice  = $orderprice + $pricedelivery;
$now = date("y.m.d.H:i:s");

$couponcount = getDAta("coupon", "coupon_id = '$couponid' AND coupon_expire > '$now' AND coupon_count > 0", null, false);
if ($couponcount > 0) {
    $totalpprice = $orderprice - $orderprice * $coupondiscount  / 100 + $pricedelivery;
    $stmt = $con->prepare("UPDATE `coupon` SET `coupon_count`='coupon_count' - 1 WHERE 1");
    $stmt->execute();
}

$data = array(
    "orders_usersid" => $userid,
    "orders_address" => $addresid,
    "orders_type" => $orderstype,
    "orders_pricedelivery" => $pricedelivery,
    "orders_price" => $orderprice,
    "orders_coupon" => $couponid,
    "orders_paymantmethod" => $paymantmethod,
    "orders_totalprice" => $totalpprice,
    "orders_status" => "0"
);
$count = insertData($table, $data, false);
if ($count > 0) {
    $stmt = $con->prepare("SELECT MAX(orders_id) FROM orders");
    $stmt->execute();
    $maxid = $stmt->fetchColumn();
    $data1 = array("cart_orders" => $maxid);
    updateData("cart", $data1, "cart_usersid = $userid AND cart_orders = 0");
}
