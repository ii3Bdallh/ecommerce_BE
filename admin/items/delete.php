


<?php
include "../../connect.php";
$table = "items";
$id = filterRequest("id");
$image = filterRequest("image");
deleteFile( "../../upload/items" , $image);
deleteData($table , " `items_id` = '$id' ");

// $table = "categories";
// $id = filterRequest("id");
// $image = filterRequest("image");
// deleteFile("../../upload/categories", $image);
// deleteData($table, "categories_id = $id");