<?php

include "connect.php";
$usersid = filterRequest("usersid");
getAllData("notification" , "notification_userid = $usersid "  ) ;
