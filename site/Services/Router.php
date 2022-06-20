<?php

namespace Site\Services;
class Router
{
    private static $list = [];
    
    public static function page($url, $page_name)
    {
        self::$list[] = [
            "url"   =>  $url,
            "page"  =>  $page_name
        ];
    }

    public static function enable()
    {
        $query = $_GET['q'];
        foreach(self::$list as $route){
            if ($route["url"] === '/' . $query){
                require_once "views/pages/" . $route["page"] . ".php";
                die();
            }
        }

        self::error();
    }

    private static function error()
    {
        require_once "views/errors/404.php";
    }
}