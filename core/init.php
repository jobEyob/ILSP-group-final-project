<?php
session_start();

$GLOBALS['config']=array(  
  'mysql' =>array(
    'host'=>'localhost',
    'username'=>'root',
    'password'=>'root',  
    'db'=>'info_location_db'
    
),
    'remember'=>array(
      'cookie_name'=>'hash',
      'cookie_expiry'=>604800
),
'session'=>array(
    'session_name'=>'user',
    'token_name'=>'token'
)
);

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/classes/' . $class . '.php';
     
    //require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/classes/Config.php';
    //require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/classes/Input.php';
});

  $conf=new Config();//this for to inislaze spl_autoload
  // $in=new Input();
require_once $_SERVER['DOCUMENT_ROOT']. '/ILSP-group-final-project/functions/sanitize.php';

/**********************************************************
 * this for if user chack remember me on last login time 
 *  Created on : Mar 26, 2017, 8:50:28 AM
 *   Author    : job
 **********************************************************/

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    // die('user asked to remembered');
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    // die($hash);
    
    $hashChack = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    if ($hashChack->count()) {
        // die('hash machs, login user');
        
        $user = new User($hashChack->first()->user_id);  //$hashChack->first()->user_id this return user_id form users_session tabel
        $user->login();
        
    }
}
//$hashChack->first()->user_id this create data array in User classs