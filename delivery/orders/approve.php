<?php
include "../../connect.php";
// عامل توصيل بيختار طلب مفروض يوصله 
$ordersid = filterRequest("ordersid");
$usersid = filterRequest("usersid");
$deliveryid = filterRequest("deliveryid");

$data = array(
    "orders_status" => 3,
    "orders_delivery" => $deliveryid,

);
updateData("orders", $data, "orders_status = 2 AND orders_id = $ordersid");
insertNoti("Success", "your order is on the way", $usersid, "users$usersid", "none", "refrechorder");
// insertNoti("Success", "the ordres has been approved", $usersid, "users$usersid", "none", "refrechorder");
// sendGCM("notice", "the order has been approved by deliveryid : $deliveryid ordersid : $ordersid", "services", "none", "none");
// sendGCM("notice", "the order has been approved by deliveryid : $deliveryid ordersid : $ordersid", "delivery", "none", "none");

// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها