<?php
include "../../../connect.php";
// عامل توصيل بيختار طلب مفروض يوصله 
$ordersid = filterRequest("ordersid");
$usersid = filterRequest("usersid");

$data = array(
    "orders_status" => 1,

);
updateData("orders", $data, "orders_status = 0 AND orders_id = $ordersid");
insertNoti("Success", "your order is Accepted from shop", $usersid, "users$usersid", "none", "refrechorder");

// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها