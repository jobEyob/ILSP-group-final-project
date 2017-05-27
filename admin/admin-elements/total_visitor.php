<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/classes/admin_class.php';
$chartdata=select($sql = "SELECT id,ip FROM `stattracker` where DATE(thedate_visited)=CURDATE()");
$array = json_encode($chartdata);

print_r($array);
