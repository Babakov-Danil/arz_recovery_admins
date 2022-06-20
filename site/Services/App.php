<?php

namespace Site\Services;

class App{

    public static function start()
    {
        self::libs();
        self::db();
    }

    public static function libs()
    {
        $config = require_once "config/app.php"; 
        foreach ($config["libs"] as $lib) {
            require_once "libs/" . $lib . ".php";
        }
    }

    public static function db()
    {
        $configdb = require_once "config/db.php"; 

        if ($configdb['enable']){
            \R::setup( 'mysql:host=' . $configdb["host"] . ';dbname='. $configdb["dbname"],
            $configdb["user"], $configdb["password"]);    
            
            if (!\R::testConnection()) {
                die('Error datebase');
            }
        }
    }
}