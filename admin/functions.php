<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ILSP-group-final-project/master/header.php';
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
  $GLOBALS['user']->getAll('*',$request);
  $result=$GLOBALS['user']->results();
  return re_table_creater($result);

}
/*request list table creater*/
function re_table_creater($result){
  //print_r($GLOBALS['user']->results());
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

          echo "<td >";

                echo $key->account_status;

          echo "</td>";


        echo "<td>";
          echo "<input type='checkbox' name='checkboxvar[]' value='".$key->id."'>";
        echo "</td>";
      echo "</tr>";
    }
}
