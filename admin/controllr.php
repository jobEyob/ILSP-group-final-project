<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/core/init.php';

$user=DB::getInstance();
if(isset($_GET['action']) == "deactivate"){
//  echo 'controllr';
//     $val=$_POST['val'];
//     $val = explode(",", $val);
//     $arrlength = count($val);
//
//     for($x = 0; $x < $arrlength; $x++){
//         //echo $val[$x];
//         $id=$val[$x];
//         //# rules
//             //  0:for new request
//             //  1:for request accept,
//             //  2:for active accounts,
//             //  3:for deactivated
//             //  4:for rejected request
//         $organizetions='organizetions';
//         $data=["account_status"=>"'block'"];
//         $user->updateAdmin($organizetions,$id,$data);
//       //the table row should be change
//     }
//
//
// }else if (isset($_GET['able'])=='org_list') {
  # code...
    org_list();

}else if (isset($_GET['requestAccept'])=='accept') {
  # code...
  echo 'controllr';
}

function org_list(){
  //$user=$GLOBALS[$user];
    $organizetions='organizetions';
    $user->getAll('id,user_id,org_name,account_status',$organizetions);
  //  print_r( $result=$user->results());
     $result=$this->user->results();

      table_creater($result);
}
function table_creater($result){

    foreach ($result as $key) {
        //print_r($key);
        echo "<tr>";
          echo "<td>";
            echo "<a href='/ILSP-group-final-project/Acount/index.php?user_id=".$key->user_id."'>";
                echo $key->id;
            echo "</a>";
          echo "</td>";

          echo "<td>";
            echo "<a href='/ILSP-group-final-project/Acount/index.php?user_id=".$key->user_id."'>";
                echo $key->org_name;
            echo "</a>";
          echo "</td>";

          echo "<td>";

                echo $key->account_status;

          echo "</td>";


        echo "<td>";
          echo "<input type='checkbox' name='checkboxvar[]' value='".$key->id."'>";
        echo "</td>";
      echo "</tr>";
    }
}


//else if()
