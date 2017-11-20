<?php
require_once(LIB_PATH.DS."database.php");

class Apply extends DatabaseObject {
    protected static $table_name = "user_job";
    protected static $db_fields = array('user_id', 'job_id', 'registration_date', 'status');
    
    public $user_id;
    public $job_id;
    public $registration_date;
    public $status;
    
   public function save() {
            $this->registration_date = strftime("%Y-%m-%d %H:%M:%S", time());
       $this->status = "N";
            if(parent::create()) {
                
                 return true;
                
            }
            else {
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
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

    
//    public static function make($photo_id, $author="Anonymous", $body="") {
//        if(!empty($photo_id) && !empty($author) && !empty($body)) {
//            $comment = new Comment();
//            $comment->photograph_id = (int)$photo_id;
//            $comment->created = strftime("%Y-%m-%d %H:%M:%S", time());
//            $comment->author =$author;
//            $comment->body = $body;
//            return $comment;
//        }
//        else {
//            return false;
//        }
//    }
//    
//    public static function find_comments_on($photo_id=0) {
//        global $db;
//        $query = "SELECT * FROM ".static::$table_name;
//        $query .= " WHERE photograph_id = ".$db->escape_value($photo_id);
//        $query .= " ORDER BY created ASC";
//        return static::find_by_sql($query);
//    }
}
?>