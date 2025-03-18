<?php
include "../../connect.php";
$table = "items";
$name =         filterRequest("name");
$namear =       filterRequest("namear");
$des =          filterRequest("desc");
$desar =        filterRequest("desc_ar");
$count =        filterRequest("count");
$active =       filterRequest("active");
$price =        filterRequest("price");
$discount =     filterRequest("discount");
$items_cat =    filterRequest("catid");
// $datenow =      filterRequest("date");
$image1 =       filterRequest("file");
$id =           filterRequest("itemsid");

$image2 =   imageUpload("../../upload/items", "file");
// echo $image2 ;
if($image2 == "empty"){
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
        // "items_date" => $datenow,
    );

}else{
    deleteFile("../../upload/items" , $image1);
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
        "items_image" => $image2,
        // "items_date" => $datenow,
    );

}


updateData($table, $data , "items_id = $id");
