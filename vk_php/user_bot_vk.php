<?php
require_once "vendor/autoload.php";
// class
use DigitalStar\vk_api\vk_api; // Основной класс
use DigitalStar\vk_api\LongPoll; //работа с longpoll

//token
const VK_KEY = '***'; //токен пользователя
const VERSION = '5.101'; //версия используемого api

//authorization
$vk = vk_api::create(VK_KEY, VERSION);
$vk = new LongPoll($vk);
//
$vk->listen(function($data)use($vk){ //longpoll для пользователя
    if ($data[0] == 52 & $data[1] == 7 & $data[2] - 2000000000 == 232){
        $chat_id = $data[2] - 2000000000;
        $vk->kick($chat_id,$data[3]);
    }
});
