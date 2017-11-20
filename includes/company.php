<?php
require_once(LIB_PATH.DS."database.php");

class Company extends DatabaseObject{
    protected static $table_name = "companytable";
    protected static $db_fields = array('id', 'email', 'password', 'phone', 'postal_code', 'biography', 'services', 'vision', 'staff_number', 'clients','address');
    public $id;
    public $email;
    public $password;
    public $name;
    public $address;
    public $phone;
    public $postal_code;
    public $biography;
    public $services;
    public $vision;
    public $staff_number;
    public $clients;
    public $cp;
 public $errors = array();
  
   
    public static function authenticate($username="", $password="") {
        global $db;
        $username = $db->escape_value($username);
        $password = $db->escape_value($password);
        
        
        $query = "SELECT * FROM companytable ";
        $query .= "WHERE name = '{$username}' ";
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
            if(strlen($this->name) >= 255) {
                $this->errors[] = "The Last name can only be 255 characters long.";
                return false;
            }
            if(strlen($this->biography) >= 255) {
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
            $query = "SELECT * FROM companytable WHERE password = md5('{$this->password}') LIMIT 1";
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
            $query = "SELECT * FROM companytable WHERE email = '{$this->email}' LIMIT 1";
            $result_array = self::find_by_sql($query);
            if($result_array){
                $this->errors[] = "Email exists";
            }
               
            $this->registration_date = 'NOW()';
            
            if(parent::create()) {
                

                    $add = new Approval();
                    $add->id = $this->company_id;
                    $add->status = "Y"; 
                    if($add->save()) {
                       return true;

                    } else {
                        return false;
                    }
                       
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