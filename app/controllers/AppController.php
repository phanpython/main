<?php

namespace controllers;

use core\base\Controller;

class AppController extends Controller
{
    protected function checkAuthorization() {
        if(!isset($_COOKIE['user'])) {
            header('Location: http://trans');
            die();
        }
    }
}