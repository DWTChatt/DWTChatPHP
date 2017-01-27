<?php
//----------------------------------------------------------------------------------------------------
// NEPTUNE PHP FRAMEWORK V2.0
//----------------------------------------------------------------------------------------------------
//
// Author     : Emirhan ENGIN <whitekod.com2001@gmail.com>
//              Mehmet Ali PEKER <thecoder@outlook.com.tr>
// Copyright  : Copyright (c) 2016-2017, NEPTUNE FRAMEWORK V2.0
//
//----------------------------------------------------------------------------------------------------
class Application
{
    protected $controller   = 'home';
    protected $method       = 'index';

    public function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])){
            require 'Applications/Controllers/' . $this->controller . '.php';
            $method = $this->method;
            $ctrl = new $this->controller();
            $ctrl->$method();
            return false;
        }
        $this->controller = $url[0];
        $file = 'Applications/Controllers/' . $this->controller . '.php';
        if (file_exists($file)){
            require $file;
        }else {
            echo Error::page404();
            return false;
        }
        $this->controller = new $url[0];
        if (isset($url[2])){
            if (method_exists($this->controller ,$url[1])){
                $this->controller->{$url[1]}($url[2]);
            }else {
                echo Error::page404();
                return false;
            }
        }else {
            if (isset($url[1])){
                if (!method_exists($this->controller ,$url[1])){
                    echo Error::page404();
                }else {
                    $this->controller->{$url[1]}();
                }
            }else if (empty($url[1])){
                $this->controller->index();
            }
        }
    }
}