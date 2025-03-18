

<?php

include "../connect.php";


$userid = filterRequest("usersid");
$itemid = filterRequest("itemsid");



deleteData("cart", "cart_id = (SELECT cart_id FROM cart WHERE cart_usersid = $userid AND cart_itemsid = $itemid AND cart_orders = 0 LIMIT 1)  ");
