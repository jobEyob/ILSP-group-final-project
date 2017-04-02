<?php
class Input{
    public static function exists($type = 'post'){
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;

                break;
            
            case 'get':
                return (!empty($_GET)) ? true: false;

                break;

            default:
                return false;
                break;
        }
        
}
public static function get($item){
    if(isset($_POST[$item])){
        return $_POST[$item];
    } else {
        if (isset($_GET[$item])){
            return $_GET[$item];
        }
    }
    return '';
}

public static function getfile($submit_name ){
    if(isset($_POST[$submit_name])){
        return $_POST[$submit_name];
    } else {
        if (isset($_GET[$submit_name])){
            return $_GET[$submit_name];
        }
    }
    return '';
}

}