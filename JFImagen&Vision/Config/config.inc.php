<?php

class database {

    public static function connect() {
        $db = new mysqli('localhost:3306', 'root', '', 'jfimagen&vision');
        echo $db->error;
        $db->query("SET NAME 'utf8'");
        
        return $db;
    }

}
