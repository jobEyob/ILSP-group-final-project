<?php require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/core/init.php';   ?>

<?php
$user =new User();
$date=date("Y-m-d h:i:s");
$user->update('users', array( 'last_LogoutTime'=> $date ));

$user->logout();
 
 Redirect::to('../index.php');
 
 
