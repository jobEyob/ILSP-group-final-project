<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
$user =new User();
$db=DB::getInstance();
if($user->isLoggedIn()){
  if(!$user->hasPermission('admin')){
    Redirect::to('/ILSP-group-final-project/pages/login.php');
  }
}else {
  Redirect::to('/ILSP-group-final-project/pages/login.php');
}


include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-sidebar.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/functions.php';
?>
<!-- view organization start -->
<div class="col-md-10">
    <h3>comment</h3>

</div>
<div id="outputtest"></div>
<!-- view organization end -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';


?>
