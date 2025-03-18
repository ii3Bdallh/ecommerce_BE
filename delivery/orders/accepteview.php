<?php

include  "../../connect.php";
// اظهر الطلبات الي عامل توصيل مفروض يوصلها 
$deliveryid = filterRequest("deliveryid");
getAllData("oredersview", "orders_type = 0 AND orders_status = 3 AND  orders_delivery	= $deliveryid ");

// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها
