<?php
$organizetions_id_table=single_array_decoder(select($sql = "SELECT  `id`  FROM `organizetions` WHERE `user_id`=".Session::get('user_id')));
$organizetions_table=select($sql = "SELECT  `org_name`, `org_description`, `logo_name`  FROM `organizetions` WHERE `user_id`=".Session::get('user_id'));
$address_table=select($sql = "SELECT  `website`, `fax`, `po_box`, `phone_number`, `tell_phone` FROM `address` WHERE `org_id`=".$organizetions_id_table);
$location_table=select($sql = "SELECT `latitude`, `longitude`, `location_name`, `region`, `city`, `sub_city` FROM `locations` WHERE `org_id`=".$organizetions_id_table);
$services_table=select($sql = "SELECT  `category`, `service_in_day`, `service_in_week`, `open_time`, `close_time`, `service_year`, `service_des` FROM `services` WHERE `org_id`=".$organizetions_id_table);


$tbl1=profile_file_count($organizetions_table);
$tbl2=profile_file_count($address_table);
$tbl3=profile_file_count($location_table);
$tbl4=profile_file_count($services_table);
$profile_completed=profile_percent($tbl1+$tbl2+$tbl3+$tbl4);
$profile_uncompleted=100-$profile_completed;




 ?>
