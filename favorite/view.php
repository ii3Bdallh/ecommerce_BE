<?php

include "../connect.php";

$userid = filterRequest("id");



getAllData("myfavorite","favorite_usersid= ?",array($userid));