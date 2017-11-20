<?php
class Approval extends DatabaseObject {
    protected static $table_name = "approvals";
    protected static $db_fields = array("id", "registration_date", "status", "name", "email");
    public $id;
    public $status;
    public $name;
    public $email;
    public $registration_date;
    
    public $errors = array();

           
     public function save() {
        if(isset($this->id)) {
            parent::update();
        }
        else {
            if(!empty($this->errors)) {return false;}
            
            $this->registration_date = 'NOW()';
            $this->status = "N";
                    
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
        if(parent::delete()) {
            return true;
        }
        else {
            return false;
        }
    }

    
   
}
?>