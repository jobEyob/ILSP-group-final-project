<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
$user =new User();
if($user->isLoggedIn()){
  if(!$user->hasPermission('admin')){
  Redirect::to('/ILSP-group-final-project/pages/login.php');
  }
}else {
Redirect::to('/ILSP-group-final-project/pages/login.php');
}
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-sidebar.php';
?>
  comment
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
