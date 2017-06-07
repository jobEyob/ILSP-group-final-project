<?php

function org_list(){

  $organizetions='organizetions';
  $GLOBALS['user']->getAll('id,user_id,org_name,account_status',$organizetions);
  //  $GLOBALS['user']->getAll('id,user_id,org_name,account_status',$organizetions);

//  print_r( $result=$user->results());
   $result=$GLOBALS['user']->results();

    return table_creater($result);
}

function request_list(){

  $request='request';
  $GLOBALS['user']->get($request,array("account_status","=","newRequest"));
  $result=$GLOBALS['user']->results();
  //$request=count( $result);
  // if($result!=Array ( )){
    re_table_creater($result);
  // }else{
  //   echo 'there is no new request';
  // }
}
/*request list table creater*/
function re_table_creater($result){
  //print_r($GLOBALS['user']->results());
  if(count($result)!=0){
    foreach ($result as $key) {
      //print_r($key);
      $file=$key->auto_paper_path;
      if($key->auto_paper_path!=""){
        //$file="<span class='glyphicon glyphicon-paperclip'></span>";
        $file=$key->auto_paper_path;
      }else {
        $file="file not found";
      }
      echo "<tr class='".$key->account_status."' id='".$key->id."' >";
      echo "<td>".$key->id."</td>";
      echo "<td>".$key->org_name."</td>";
      echo "<td>".$key->org_email."</td>";
      echo "<td>".$key->org_phone."</td>";
      echo "<td>".$key->org_location."</td>";
      #echo "<td><img src='/ILSP-group-final-project/".$key->auto_paper_path."'/></td>";
      echo "<td><a class='paper' href='#' data-toggle='modal' data-target='#myModal'>".$file."</a></td>";
      echo "<td>".$key->account_status."</td>";
      echo "<td><input type='checkbox' name='select_checkbox[]' class='selectedID'  value='".$key->id."'/></td>";
      echo "</tr>";
    }
  }else{
  echo '<script>bootbox.alert("there is no new request");</script>';
  }
}
/*organization list table creater*/
function table_creater($result){
  
    foreach ($result as $key) {
        //print_r($key);
        echo "<tr class='".$key->account_status."'>";
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

          echo "<td id='". $key->account_status."' >";
//
//
//
//
//
//           echo '<div class="dropdown">
//   <a class="dropdown_link dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
//     Dropdown
//     <span class="caret"></span>
//   </a>
//   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
//     <li><a href="#">Action</a></li>
//     <li><a href="#">Another action</a></li>
//     <li><a href="#">Something else here</a></li>
//     <li role="separator" class="divider"></li>
//     <li><a href="#">Separated link</a></li>
//   </ul>
// </div>';
            // echo "<select name='account_status_option[]'>
            //         <option vlaue='". $key->account_status."'>block</option>
            //         <option value='". $key->account_status."'>test1</option>
            //       </select>";
            //
            //





                echo $key->account_status;

          echo "</td>";


        echo "<td>";
          echo "<input type='checkbox' name='checkboxvar[]' value='".$key->id."'>";
        echo "</td>";
      echo "</tr>";
    }
}
