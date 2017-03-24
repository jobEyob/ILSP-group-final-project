<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>

<?php
$user =new User();

$user->logout();
 
 Redirect::to('../index.php');
 
 
