<?php

function profile_file_count ($profile_data){
$profile=0;
  foreach ($profile_data as $key) {
    # code...
    foreach ($key as $val ) {
      # code...
      if($val=!''){
        $profile++;
//notfiled/7*100=
      }
    }
  }
//  $profile=$profile/22*100;
  return $profile;
}

function profile_percent ($profile_data){
  $profile=$profile_data/22*100;
  return floor($profile);
}


 ?>
