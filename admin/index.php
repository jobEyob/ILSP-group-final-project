<?php

include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/core/init.php';
$user =new User();
if($user->isLoggedIn()){
  if(!$user->hasPermission('admin')){
    Redirect::to('/ILSP-group-final-project/pages/login.php');
  }
}else {
  Redirect::to('/ILSP-group-final-project/pages/login.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-sidebar.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-elements/dashbord.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';


?>
