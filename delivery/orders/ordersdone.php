<?php
include "../../connect.php";

$ordersid = filterRequest("ordersid");
$usersid = filterRequest("usersid");

$data = array(
    "orders_status" => 4
);
updateData("orders", $data, "orders_status = 3 AND orders_id = $ordersid");
insertNoti("Success", "you order has been  deliverd", $usersid, "users$usersid", "none", "refrechorder");
// insertNoti("Success", "the ordres has been approved", $usersid, "users$usersid", "none", "refrechorder");
// sendGCM("notice", "the order has been deliverd to coustomer ordersid : $ordersid", "services", "none", "none");

// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها