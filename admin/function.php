<?php

function profile_percent ($profile_data){
$profile=0;
  foreach ($profile_data as $key) {
    # code...
    foreach ($key as $val ) {
      # code...
      if($val==''){
        $profile++;
//notfiled/7*100=
      }
    }
  }
  $profile=$profile/7*100;
  return $profile;
}

function profile_single_percent ($profile_data){
$profile=0;
  foreach ($profile_data as $key) {
    # code...

      # code...
      if($key==''){
        $profile++;
//notfiled/7*100=

    }
  }
  $profile=$profile/7*100;
  return $profile;
}


 ?>
