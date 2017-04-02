<?php
class User {
  
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn,
            $_CookieName,
            $_multipldata;
            
    function __construct($user=null) {
        $this->_db= DB::getInstance();
        $this->_sessionName= Config::get('session/session_name');
        $this->_CookieName= Config::get('remember/cookie_name');
        
        if(!$user){
            if(Session::exists($this->_sessionName)){
               $user= Session::get($this->_sessionName);
              // echo $user;
               if($this->find($user)){
                   $this->_isLoggedIn=true;
               }else{
                   //logout
               }
            }
          
        }else{
            $this->find($user);
        }
    }
    
    public function update($tabel, $fields =array(), $id=null){
        if(!$id && $this->isLoggedIn()){
            $id= $this->data()->id;
        }
        if (!$this->_db->update($tabel, $id, $fields)){
            throw new Exception("there problem in updating.");
        }
    }

    public function create($tabel, $fileds=array()){
       
        if(!$this->_db->insert($tabel, $fileds )){
        throw new Exception('There poblame hapend.');
        }
    }
    
    public  function find($user=null){
        if ($user){
          $field = (is_numeric($user))? 'id':'username';
          $data= $this->_db->get('users', array($field, '=', $user)); //get methode crated in DB classs
          if($data->count()){
              $this->_data=$data->first();
              return true;
          }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false) {

        if (!$username && !$password && $this->exists()) { //this for user that chack remember me in last login time
            Session::put($this->_sessionName, $this->data()->id);
        } else {

            $user = $this->find($username);
            //print_r($this->_data);
            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {

                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::uniqid();

                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            // $hash= Hash::uniqid();
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }
                        Cookie::put($this->_CookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }

    
    public function exists(){
        return (!empty($this->_data)? true: false);
    }

        //for logout
    public function logout(){
        
        $this->_db->delete('users_session', array('user_id', "=", $this->data()->id)); // delete from users_session tabel by user id
        
        Session::delete($this->_sessionName);
        Cookie::delete($this->_CookieName); // for chack remember me // user in login time // for delete cookie from user computer
    }

        public function data(){
      return  $this->_data;
    }
    
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
    /***************************************
     *  this for get data from different tabel
     ***************************************/
    public function multiplyfinde($tabel,$id){
        if($tabel && $id){
           // $this->find();   
        //$multipledata= $this->_db->get('organazetions', array('user_id', "=", $this->data()->id));
          $multipledata= $this->_db->get($tabel, array($id, "=", $this->data()->id)); 
        if ($multipledata->count()){
            $this->_multipldata=$multipledata->first();
            return true;
        }
        }
        return false;
    }
    
    public function multiplydata(){
        return $this->_multipldata;
    }
    
}