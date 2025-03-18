<?php

include  "../../connect.php";
 // اطهر الطلبات المتاحه للنوصيل 
getAllData("oredersview", "orders_type = 0	AND orders_status = 2  ");

// 1 => pinding    اطهر الطلبات المتاحه للنوصيل 
// 2 => approve    عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte    اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive    عرض طالبات الي تمت توصيلها  