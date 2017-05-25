
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
    
    $user =new User();
   
if($user->isLoggedIn()){
    
     if(!$user->hasPermission('admin')){
    Redirect::to(' ../pages/login.php');
     }
} else {
   
    Redirect::to(' ../pages/login.php');
    
}
 ?>
<div id="ac">
<?php
 echo 'well came you have administerate';
 ?>
</div>