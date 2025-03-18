<?php
include "../../connect.php";
$table = "categories";
$id = filterRequest("id");
$image = filterRequest("image");
deleteFile( "../../upload/categories" , $image);
deleteData($table , "categories_id = $id");
