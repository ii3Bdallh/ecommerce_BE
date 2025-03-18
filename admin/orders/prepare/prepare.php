<?php
include "../../../connect.php";

$ordersid = filterRequest("ordersid");
$usersid = filterRequest("usersid");
$type = filterRequest("ordertype");

if($type = "0"){
    $data = array(
        "orders_status" => 2
    );
}else{
    $data = array(
        "orders_status" => 4
    );
}


updateData("orders", $data, "orders_status = 1 AND orders_id = $ordersid");
insertNoti("Success", "the ordres has been prepared", $usersid, "users$usersid", "none", "refrechorder");
if ($type = "0") {
    // sendGCM("notice", "there are orders waiting approval", "delivery", "none", "none");
    
}
// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها