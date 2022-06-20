<?php
$vkid = $_SESSION['vkid'];

                $vk = 'vk.com/id'.$vkid;
                $fieldsSearch = array(
                        'method'        =>      'user.search',
                        'secret_key'    =>      'fhnvo4uf9fhfk',
                        'token'         =>      '3bf5400e4933d8702ab6a2a39b6463a6',
                        'search'        =>      $vk,
                        'server'        =>      '5',
                );
                $fieldsSearch = file_get_contents('https://risbot.ru/BOT/api.php?' . urldecode(http_build_query($fieldsSearch)));
                $fieldsSearch = json_decode($fieldsSearch, true);
                $risbotid = $fieldsSearch[0][0];
                $fieldsInfo = array(
                        'method'        =>      'user.info',
                        'secret_key'    =>      'fhnvo4uf9fhfk',
                        'token'         =>      '3bf5400e4933d8702ab6a2a39b6463a6',
                        'server'        =>      '5',
                        'user_id'       =>      $fieldsSearch[0][0],
                );
                $fieldsInfo = file_get_contents('https://risbot.ru/BOT/api.php?' . urldecode(http_build_query($fieldsInfo)));
                $fieldsInfo = json_decode($fieldsInfo, true);

                if (!$fieldsSearch['error_code']<>0 ){
                        $find = R::findOne('users','idvk = ?',[$_SESSION['vkid']]);
                        $nick1 = $find['nicknew'];
                        $nick2 = $fieldsInfo[0][0];
                        $needcheck = $fieldsInfo[0][20];
                        $reason = explode("[ уровень", $fieldsInfo[0][20]);
                        $reason = $reason[0];
                        if ($reason == 'Неизвестно'){
                                $reason = "Неизвестно";
                        }
                        $lvl = explode(":", $fieldsInfo[0][20]);
                        $lvl = explode(" ",$lvl[1]);
                        $lvl = $lvl[1];
                        if ($lvl >= 2){$lvla = $lvl - 1;} else {$lvla = $lvl;}
                        $lnikForum = $fieldsInfo[0][21];
                        $discordID = $fieldsInfo[0][22];
                        $linkVK = $fieldsInfo[0][25];
                        $linkVK = "https://vk.com/id".$linkVK;
                        $dateOne = $fieldsInfo[0][17];
                        $dateTwo = $fieldsInfo[0][24];
                        $townandage = explode("/", $fieldsInfo[0][23]);
                        $age = $townandage[0];
                        $town = $townandage[1];
                        $vig1 = $fieldsInfo[0][3];
                        $vig2 = $fieldsInfo[0][4];
                        if ($vig1 > 0 || $vig2 > 0){$vig = "Да (Строгих: $vig1 | Устных: $vig2)";}else {$vig = 'Нет';}
                        if ($nick1 == 'nil' || $nick1 == $nick2){
                                $state1 = "Восстановление бывшего администратора $nick2 [$lvla]";
                                $state2 = "Ник: $nick2";
                        }else { $state1 = "Восстановление бывшего администратора $nick1 [$lvla]";
                                $state2 = "Ник: $nick1 ($nick2)";}
                }
                else{
                        $find = R::findOne('users','idvk = ?',[$_SESSION['vkid']]);
                        $nick1 = $find['nicknew'];
                        $nick2 = 'test';
                        $reason = "Неизвестно";
                        $lvl = '3';
                        if ($lvl >= 2){$lvla = $lvl - 1;} else {$lvla = $lvl;}
                        $lnikForum = 'https://forum.arizona-rp.com/members/432101';
                        $discordID = '12412412152';
                        $linkVK = "https://vk.com/id139061591";
                        $dateOne = '20.05.2022';
                        $dateTwo = '20.06.2022';
                        $age = '18';
                        $town = 'test';
                        $vig1 = '1';
                        $vig2 = '2';
                        if ($vig1 > 0 || $vig2 > 0){$vig = "Да (Строгих: $vig1 | Устных: $vig2)";}else {$vig = 'Нет';}
                        if ($nick1 == 'nil' || $nick1 == $nick2){
                                $state1 = "Восстановление бывшего администратора $nick2 [$lvla]";
                                $state2 = "Ник: $nick2";
                        }else { $state1 = "Восстановление бывшего администратора $nick1 [$lvla]";
                                $state2 = "Ник: $nick1 ($nick2)";}
                }
?>