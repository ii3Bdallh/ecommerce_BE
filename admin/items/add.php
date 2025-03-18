<?php
include "../../connect.php";
$table = "items";
$name =         filterRequest("name");
$namear =       filterRequest("namear");
$des =          filterRequest("desc");
$desar =        filterRequest("desc_ar");
$count =        filterRequest("count");
$active =       "1";
$price =        filterRequest("price");
$discount =     filterRequest("discount");
$items_cat =    filterRequest("catid");
// $datenow =    filterRequest("date");
$imagename =    imageUpload("../../upload/items" ,"file");

$data = array(
    "items_name" => $name,
    "items_name_ar" => $namear,
    "items_desc" => $des,
    "items_desc_ar" => $desar,
    "items_count" => $count,
    "items_active" => $active,
    "items_price" => $price,
    "items_discount" => $discount,
    "items_cat" => $items_cat,
    "items_image" => $imagename,
    // "items_date" => $datenow,
);

insertData($table, $data);
