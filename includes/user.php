<?php
require_once(LIB_PATH.DS."database.php");

class User extends DatabaseObject{
    protected static $table_name = "usertable";
    protected static $db_fields = array('id', 'email', 'password', 'firstname', 'lastname', 'dob', 'phone', 'username', 'gender', 'access');
    public $id;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $username;
    public $gender;
    public $phone;
    public $access;
 public $errors = array();
    public function full_name() {
        if(isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name. " " .$this->last_name;
        }
        else {
            return "";
        }
    }
   
    public static function authenticate($username="", $password="") {
        global $db;
        $username = $db->escape_value($username);
        $password = $db->escape_value($password);
        
        
        $query = "SELECT * FROM usertable ";
        $query .= "WHERE username = '{$username}' ";
        $query .= "AND password = md5('{$password}') ";
        $query .= "LIMIT 1";
        
        $result_array = self::find_by_sql($query);
        
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
       
     public function save() {
        if(isset($this->id)) {
            parent::update();
        }
        else {
            if(!empty($this->errors)) {return false;}
            if(strlen($this->lastname) >= 255) {
                $this->errors[] = "The Last name can only be 255 characters long.";
                return false;
            }
            if(strlen($this->firstname) >= 255) {
                $this->errors[] = "The First name can only be 255 characters long.";
                return false;
            }
            if(strlen($this->email) >= 255) {
                $this->errors[] = "The email can only be 255 characters long.";
                return false;
            }
            if($this->cp != $this->password) {
                $this->errors[] = "Passwords don't match";
                return false;
            }
            $query = "SELECT * FROM usertable WHERE password = md5('{$this->password}') LIMIT 1";
            $result_array = self::find_by_sql($query);
            if($result_array){
                $this->errors[] = "Password exists";
                return false;
            }
            if($this->password === false){
                $this->errors[] = "*Enter a password";
                return false;
            }
               
            if($this->email === false) {
                $this->errors[] = "*Enter an email";
                return false;
            }
            $query = "SELECT * FROM usertable WHERE email = '{$this->email}' LIMIT 1";
            $result_array = self::find_by_sql($query);
            if($result_array){
                $this->errors[] = "Email exists";
            }
               
            $this->registration_date = 'NOW()';
            
            if(parent::create()) {
                if ($this->access === 'c') {
                    

                 
                       return true;

                  
                }
                 return true;
                
            }
            else {
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
            }
        }
    }
    
      public function destroy()
    {
        if(parent::delete()) {
            return true;
        }
        else {
            return false;
        }
    }

    

}
?>