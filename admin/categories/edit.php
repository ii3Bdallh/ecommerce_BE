<?php
include "../../connect.php";
$table = "categories";
$name = filterRequest("name");
$namear = filterRequest("namear");
$id = filterRequest("id");
$image2 =   imageUpload("../../upload/categories", "file");
$image1 = filterRequest("file");
// echo $image2 ;
if($image2 == "empty"){
    $data = array(
        "categories_name" => $name,
        "categories_name_ar" => $namear,
    );

}else{
    deleteFile("../../upload/categories" , $image1);
    $data = array(
        "categories_name" => $name,
        "categories_name_ar" => $namear,
        "categories_image" => $image2,
    );

}


updateData($table, $data , "categories_id = $id");
