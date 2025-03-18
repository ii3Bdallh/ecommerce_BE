<?php

include  "../../connect.php";

$deliveryid = filterRequest("deliveryid");
getAllData("oredersview", "1 = 1 AND  orders_status = 4 AND  orders_delivery	= $deliveryid  ");

// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها