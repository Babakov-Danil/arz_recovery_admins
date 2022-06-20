<?php

use Site\Services\Router;

Router::page('/login', 'login');
Router::page('/', 'profile');
Router::page('/updatenick', 'updatenick');
Router::page('/error', 'error');
Router::page('/checking', 'checkquest');
Router::page('/test', 'test');
Router::enable();