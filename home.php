<?php
include "connect.php";
$alldata = array();
$alldata["status"] = "success";

$categories = getAllData("categories", null, null, false);
$alldata["categories"] = $categories;


$items = getAllData("topsellingitems", "1=1 ORDER BY  topitems DESC", null, false);
$alldata["items"] = $items;


$settings = getAllData("settings", "1=1 ", null, false);
$alldata["settings"] = $settings;

echo json_encode($alldata);
