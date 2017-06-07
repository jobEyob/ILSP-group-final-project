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

  <div class="row ">

  <form method="post" id="user_list_form" name='org_list' action="">
    <table id="myTable" class="table table-bordered">
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

          $organizetions='organizetions';
          $db->getAll('id,user_id,org_name,account_status',$organizetions);
          $result=$db->results();
           table_creater($result);

          ?>
        </tbody>

    </table>
    <!--when the type is button it will not relode the table but it will change the db-->
    <button id='deActivatedBtn' type="submit" class="btn btn-danger">Block Account</button>

    </form>

  </div>

</div>
<div id="outputtest">
test
</div>
<!-- view organization end -->
<script>

  // $('#deActivatedBtn').on('click',function() {
  //   var val = [];
  //     $(':checkbox:checked').each(function(i){
  //       val[i] = $(this).val();
  //         $('')
  //     });
  //    $("#outputtest").innerHTML=val;
  //    alert(val);
  // });

</script>
<?php
if(isset($_POST)){
  //print_r($_POST);
  $data=["account_status"=>"'block'"];
  foreach ($_POST as $key => $value) {
    for($x = 0; $x < count($value); $x++){
      $id=$value[$x];
      $db->updateAdmin($organizetions,$id,$data);
      header("Refresh:0");
    }
  }
}

include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';


?>
<style>
/*.dropdown_link{
border:2px inset red;
margin-left: 20px;
padding: 5px 10px;
}*/


</style>
