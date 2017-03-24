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
