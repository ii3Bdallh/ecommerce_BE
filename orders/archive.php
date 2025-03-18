<?php

include  "../connect.php";

$usersid = filterRequest("usersid");
getAllData("oredersview", "orders_usersid = $usersid AND orders_status = 4 ");

// 0 => wait
// 1 => prepare
// 2 => delivery
// 3 => on the way
// 4 => done