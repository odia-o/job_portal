<?php
 function strip($marked_string = "") {
            $no_zeros = str_replace("*0", "", $marked_string);
            $clean_string = str_replace("*", "", $no_zeros);
            return $clean_string;
}

function redirect_to($location = NULL) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function output_message($message = "") {
    if (!empty($message)) {
        return "<p class=\"message\">{$message}</p>";
    }
    else {
        return "";
    }
}

function __autoload($class_name) {
     $class_name = strtolower($class_name);
    $path = LIB_PATH.DS."{$class_name}.php";
    if(file_exists($path)) {
        require_once($path);
    }
    else {
        die("The file {$class_name}.php could not be found.");
    }
}

function include_layout_template($template="") {
    include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

function datetime_to_text($datetime="") {
    $unixdatetime = strtotime($datetime);
    return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}
function check_password($pword, $cpword) {
    if ($pword === $cpword) {
        return $pword;
    }
    else {
        return false;
    }
}

function set_id($t) {
    $_SESSION['val'] = $t;
}
?>