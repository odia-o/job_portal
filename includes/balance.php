<?php
class Balance extends DatabaseObject {
    protected static $table_name = "balance";
    protected static $db_fields = array("address_id", "user_id", "unit_balance");
    public $address_id;
    public $user_id;
    public $unit_balance;

    public $errors = array();
     public function save() {
        if(isset($this->address_id)) {
            parent::update_balance();
        }
        else {
            if(!empty($this->errors)) {return false;}
            
             $this->registration_date = 'NOW()';
            var_dump($this->unit_balance);
            var_dump($this->user_id);
            var_dump($this->address_id);
            echo "got ere";
            exit();
            if(parent::create()) {
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
        if(parent::delete_address()) {
            return true;
        }
        else {
            return false;
        }
    }


  
   
}
?>