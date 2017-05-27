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
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/functions.php';


?>
<div class="col-md-10">

<?php
  $organizetions='organizetions';
  $user=DB::getInstance();
?>

<!--
  <script>
    $(document).ready(function(){
      $.ajax({
        type:"POST",
        url: "/ILSP-group-final-project/admin/controllr.php?able=org_list",
        success:function(result){
        //  alert(result);
          document.getElementById('data_table').innerHTML =result;
        }
k      });
    });

  </script>-->
<?php
  //$user->getAll('id,user_id,org_name,account_status',$organizetions);
  //$result=$user->results();
  //print_r($result);
?>
<div class="row ">
<form method="post" id="user_list_form" action="">
    <table id='myTable' class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Acount status</th>
          <th>select--</th>
        </tr>
      </thead>

      <tbody id="data_table">

        <?php

          echo org_list(); ?>
      </tbody>

    </table>
    <!--when the type is button it will not relode the table but it will change the db-->
    <button id='deActivatedBtn' type="submit" class="btn btn-danger">DeActivate Account</button>
  
  </form>
</div>

<div class="row">
    <div id="outputtest">



    </div>
</div>

<script>

</script>
<?php
/*
if (isset($_POST['checkboxvar']))
{

  //print_r($_POST['checkboxvar']);
    foreach ($_POST['checkboxvar'] as $key => $value) {


        $id=$value;
        //# rules
            //  0:for new request
            //  1:for request accept,
            //  2:for active accounts,
            //  3:for deactivated
            //  4:for rejected request
        $data=["account_status"=>"3"];
      $user->update($organizetions,$id,$data);
      //the table row should be change
    }


}

*/




?>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
