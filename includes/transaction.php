<?php
class Transaction extends DatabaseObject {
    protected static $table_name = "transaction";
    protected static $db_fields = array("id", "user_id", "address_id", "amount_paid", "unit", "code_generated", "registration_date");
    public $id;
    public $user_id;
    public $address_id;
    public $amount_paid;
    public $unit;
    public $code_generated;
    public $registration_date;
    protected $tarrif = 11.76470588235294;
    
    public $errors = array();
     
       
     public function save() {
        if(isset($this->id)) {
            parent::update();
        }
        else {
            if(!empty($this->errors)) {return false;}
               
             $this->registration_date = 'NOW()';
            $this->code_generated = strval(rand(1000000000000000, 99999999999999999));
            $this->unit = $this->amount_paid / $this->tarrif;
            
            if(parent::create()) {
                $it = Balance::find_by_address_id($this->address_id);
                $it->unit_balance = $it->unit_balance + $this->unit;
                if($it->save()) {
                     return true;
                }
                else {
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