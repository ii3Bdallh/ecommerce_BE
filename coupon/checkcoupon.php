<?php

include "../connect.php";
$coupon = filterRequest("couponname");
$now = date("y.m.d.H:i:s");

getDAta("coupon" , "coupon_name = '$coupon' AND coupon_expire > '$now' AND coupon_count > 0");