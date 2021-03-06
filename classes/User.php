<?php
class User {
  
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn,
            $_CookieName,
            $_multipldata,
            $_totalpage;
            
    function __construct($user = null) {
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
        if (!$this->_db->update($tabel,'id', $id, $fields)){
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
    public function hasPermission($key){
        $group= $this->_db->get('groups', array('id', '=', $this->data()->groups));
       // print_r($group->first());
        if($group->count()){
          $parmisstion= json_decode( $group->first()->permisstion, true);
          //print_r($parmisstion);
          if($parmisstion[$key] == true){
              return true;
          }
          return false;
        }
    }

        public function exists(){
        return (!empty($this->_data)? true: false);
    }

        //for logout
    public function logout(){
        
        $this->_db->delete('users_session', array('user_id', "=", $this->data()->id)); // delete from users_session tabel by user id             
        //$date=date("Y-m-d h:i:s");                  
        //$this->_db->update('users', array( 'last_LogoutTime'=> '2013-05-27 22:00:3' ));
            
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
    /***************************************
     *  this for get total page for search-results.php
     ***************************************/
    public function finde_total($category_val,$location_val){
        if($category_val){
           
          $total_page= $this->_db->andget_total($category_val,$location_val); 
        if ($total_page->count()){
            $this->_totalpage=$total_page->first();
            return true;
        }
        }
        return false;
    }
    
    public function finde_totaldata(){
        return $this->_totalpage;
    }
    /*
    public function multiplyAll($filde,$tabel){
        if($tabel && $filde){
           // $this->find();   
        //$multipledata= $this->_db->get('organazetions', array('user_id', "=", $this->data()->id));
          $multipledata= $this->_db->getAll($filde,$tabel); 
        if ($multipledata->count()){
            $this->_multipldata=$multipledata->first();
            return true;
        }
        }
        return false;
    }
    
    public function multiplydataAll(){
        return $this->_multipldata;
    }   */
    
    public function search($tabel,$filde,$input){
        if($tabel && $filde && $input){
        $search= $this->_db->serarch_data($tabel,$filde,$input);
        if($search->count()){
            $this->_searchdata=$search;
            return true;
        } 
        }
        return false;
    }
   public function searchdata(){
       return $this->_searchdata;
   }


   


    public function send_mail($email,$message,$subject)
 {      
  require_once ($_SERVER['DOCUMENT_ROOT'].'/ILSP-group-final-project/lib/Mailer/PHPMailerAutoload.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress($email);
  $mail->Username="wegotogether01@gmail.com";  
  $mail->Password="cancan01";            
  $mail->SetFrom('wegotogether01@gmail.com','information location');
  $mail->AddReplyTo("einfo.com","information location");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 
if(!$mail->send()) {
    echo '<div class="container">
     <div class="alert alert-danger">
     <strong>email could not be sent !</strong> please check your internet connection and try again.
     </div>
     </div>
     ';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<div class="container">
     <div class="alert alert-success"> <strong> email has been sent Successfull! </strong>
     </div>
     </div>
     ';
}
 }
}
