<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
$user_class =new User();
if($user_class->isLoggedIn()){
  if(!$user_class->hasPermission('admin')){
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
/*
  $user=DB::getInstance();
  $user->getAll('*','request');
  $result=$user->results();
  //print_r($result);
*/


  $user=DB::getInstance();

  ?>
  <div class="row ">
    <form id="request_list_form" method="post" action="">
      <div class="col-md-12">
        <table  id='myTable' class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>city</th>
              <th>attached file</th>
              <th>acount status</th>
              <th>Select</th>
            </tr>
          </thead>
          <tbody>

            <?php

            echo request_list();

            /*
            foreach ($result as $key) {
              //print_r($key);
              $file=$key->auto_paper_path;
              if($key->auto_paper_path!=""){
                $file=$key->auto_paper_path;
              }else {
                $file="file not found";
              }
              echo "<tr id='".$key->id."' >";
              echo "<td>".$key->id."</td>";
              echo "<td>".$key->org_name."</td>";
              echo "<td>".$key->org_email."</td>";
              echo "<td>".$key->org_phone."</td>";
              echo "<td>".$key->org_location."</td>";
              #echo "<td><img src='/ILSP-group-final-project/".$key->auto_paper_path."'/></td>";
              echo "<td><a class='paper'href='#' data-toggle='modal' data-target='#myModal'>".$file."</a></td>";
              echo "<td>".$key->verify."</td>";
              echo "<td><input type='checkbox' name='select_checkbox[]' class='selectedID'  value='[".$key->id."]'/></td>";
              echo "</tr>";
            }*/?>

          </tbody>
        </table>
      </div>
      <div class="request_replay_controller">
        <button type="submit" name="reject" id="reject" class="btn btn-danger">Reject</button>
        <button type="submit" name="accept"  id="accept" class="btn btn-success">Accept</button>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="outputtest">some text</div>
  </div>
  <script>

$(document).ready(function(){
//it have some error but it is for ajax
/*
$("#accept").click( function(){
    var val = [];
    $(':checkbox:checked').each(function(i){
      val[i] = $(this).val();
    });

    $.ajax({
      type: "POST",
      url: "/ILSP-group-final-project/admin/controllr.php?reqiestAccept=accept"

    success: function (result) {

      //console.log(result);
      //if(result==""){ console.log('acount deactived.');}else{console.log(result);}

    document.getElementById('outputtest').innerHTML =result;
      }
    });
});
*/
});

  </script>
  <?php
  $table;
  $data;
if(isset($_POST['reject'])){
  //print_r($_POST);
  foreach ($_POST['select_checkbox'] as $key => $value) {
    $organizetions='request';
    $data=["account_status"=>"'deactivate'"];
    $user->update($organizetions,$value,$data);
  }
}elseif(isset($_POST['accept'])){
  foreach ($_POST['select_checkbox'] as $key => $value) {
    $organizetions='request';
    $data=["account_status"=>"'accepted'"];
    $user->update($organizetions,$value,$data);
  }
}
  //this is to get the checkbox value in php
  if (isset($_POST['select_checkbox']))
  {
    //print_r($_POST['select_checkbox']);
    //foreach($_POST['select_checkbox'] as $x => $x_value) {
      //echo "Key=" . $x . ", Value=" . $x_value;
     //echo $val=$x_value;
    //  echo "<br>";
  /*  foreach ($_POST['select_checkbox'] as $key => $value) {
      $organizetions='request';
      $data=["account_status"=>"'accepted'"];
        $user->update($organizetions,$value,$data);
    }*/
  }
  ?>

</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/admin/admin-footer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/footer.php';
?>
<!-- image displayer -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Attached file</h4>
      </div>
      <div id="modelTest" class="modal-body">

        <img id="attached_file_displyer" src="" style="width:404px;height:328px;">
      </div>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
