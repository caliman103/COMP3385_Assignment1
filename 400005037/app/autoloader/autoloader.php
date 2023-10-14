<?php
    spl_autoload_register(function ($classname) {
        $matches = [
            "Controller" => "/Controller$/", 
            "Model" => "/Model$/"
        ];
        $folder = 'sharedScripts';
        foreach($matches as $match => $pattern) {
            if(preg_match($pattern,$classname)) {
                $folder = $match;
                break;
            }    
        }
        $file = 'app/'.$folder.'/'.$classname.'.php';
        if(!file_exists($file)) {
            return false;
        }//end if
        require_once $file;
    });
?>