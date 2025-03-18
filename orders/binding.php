<?php

include  "../connect.php";

$usersid = filterRequest("usersid");
getAllData("oredersview", "orders_usersid = $usersid AND orders_status != 4 ");
