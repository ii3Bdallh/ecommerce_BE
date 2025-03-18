<?php
include "../connect.php";
$categoriesId = filterRequest("id");
$userid = filterRequest("usersid");

$stmt = $con->prepare(
    "SELECT DISTINCT items1view.* , 1 AS favorite , (items_price - (items_price * items_discount / 100)) AS itemspricediscount FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id 
AND favorite.favorite_usersid = $userid
WHERE categories_id = $categoriesId
UNION ALL 
SELECT DISTINCT * , 0 AS favorite , (items_price - (items_price * items_discount / 100)) AS itemspricediscount  FROM items1view 
WHERE categories_id = $categoriesId AND items_id NOT IN (SELECT items1view.items_id FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id 
AND favorite.favorite_usersid = $userid)"
);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
