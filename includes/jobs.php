<?php
class Jobs extends DatabaseObject {
    protected static $table_name = "jobs";
    protected static $db_fields = array("id", "company_id", "title", "description", "post_date", "end_date", "category");
    public $id;
    public $company_id;
    public $title;
    public $description;
    public $post_date;
    public $end_date;
    public $category;
    public $errors = array();

           
     public function save() {
        if(isset($this->id)) {
            parent::update();
        }
        else {
            if(!empty($this->errors)) {return false;}
            
            $this->post_date = strftime("%Y-%m-%d %H:%M:%S", time());
                    
            if(parent::create()) {
                
                return true;}
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