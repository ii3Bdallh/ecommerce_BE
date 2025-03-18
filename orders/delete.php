<?php

include "../connect.php"    ;

$id = filterRequest("id");

deleteData("orders" , "orders_id = $id AND orders_status = 0") ;