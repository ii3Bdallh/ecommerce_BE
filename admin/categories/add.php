<?php
include "../../connect.php";
$table = "categories";
$name = filterRequest("name");
$namear = filterRequest("namear");
$imagename = imageUpload("../../upload/categories" ,"file");

$data = array(
    "categories_name" => $name,
    "categories_name_ar" => $namear,
    "categories_image" => $imagename,
);

insertData($table, $data);
