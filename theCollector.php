<?php //collect information…

 $browser=$_SERVER['HTTP_USER_AGENT']; // get the browser name
//echo "|browser|";
 $curr_page=$_SERVER['PHP_SELF'];// get page name
//echo "|page name|";
 $ip=$_SERVER['REMOTE_ADDR'];   // get the IP address
//echo "|ip|";
 $from_page = $_SERVER['HTTP_REFERER'];//  page from which visitorcame
//echo "|from page|";
 $page=$_SERVER['PHP_SELF'];//get current page
//echo "|self page|";

//this should do if ip!does->exist{insert}else{returntime UPDATE}
//Insert the data in the table…


/*
  if(ip->exist()){
    update returntime+1;
  }else{
    insert new record;
  }
*/

  //insert into statical table
    $user->create('stattracker', array(
      'browser'=>$browser,
      'ip'=>$ip,
      'thedate_visited'=>date("Y/m/d h:i:sa"),
      'page' => $curr_page,
      'from_page'=>$from_page
    ));

//total data select
$user->_db->getAll('id','stattracker');
$totalDate=$user->_db->results();

//new visitor
//new ip from last log
/*select count(DISTINCT id) from stattracker
where date>LOG_time */

  /*$whrer=['`thedate_visited`','>','2017/05/24 09:35:11pm'];
  $user->_db->abelGet('stattracker',$whrer);
  print_r($user->_db->results());
  $newIP=$user->_db->count();
  echo 'new user'.$newIP.'==';*/
/*when i send to request at one page lode only the first one will
have be execute*/
//new registered
//new account address created after last log time

$newReg;
  /*$new_reg=['`log-date','>','2017/05/24 09:35:11pm'];
  $user->_db->abelGet('users',$new_reg);
  print_r($user->_db->results());
  $newReg=$user->_db->count();
  echo 'user list'.$newReg.'==';*/
//new request
//new request form last log time
$newReq;

//page view ***** total home page viwer from the page hosted
/*
print_r($user->_db->results());
$totalView= $user->_db->count();
echo $totalView;*/
//echo 'log_time'.$_SESSION['login_time'];

?>
