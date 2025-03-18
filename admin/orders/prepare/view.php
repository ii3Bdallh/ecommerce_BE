<?php

include "../../../connect.php";

getAllData("oredersview", "  orders_status = 1 OR orders_status = 2 OR orders_status = 3 ");
// 1 => pinding  اطهر الطلبات المتاحه للنوصيل 
// 2 => approve  عامل توصيل بيختار طلب مفروض يوصله    
// 3 => accepte  اظهر الطلبات الي عامل توصيل مفروض يوصلها 
// 4 => ordersdone بعد انتهاء تسليم الطلب
// 5 => archive عرض طالبات الي تمت توصيلها