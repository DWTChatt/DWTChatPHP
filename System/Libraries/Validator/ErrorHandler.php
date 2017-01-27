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
class ErrorHandler
{
    protected $errors = [];
    public function addError($error, $key = null){
        if ($key){
            $this->errors[$key][] = $error;
        }else {
            $this->errors[] = $error;
        }
    }
    public function all($key = null){
        return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
    }
    public function hasErrors(){
        return count($this->all()) ? true : false;
    }
    public function first($key){
        echo '
            <style>
                .msg {
                    padding: 15px 25px;
                    margin: 25px;
                    font-family: Verdana;
                    font-size: 14px;
                }
                
                .error {
                    color: hsla(0, 95%, 35%, 1);
                    border: 1px solid hsla(0, 95%, 35%, 1);
                    background-color: hsla(0, 15%, 97%, 1);
                    color: hsla(9, 87%, 46%, 1);
                    border: 1px solid hsla(9, 87%, 46%, 1);
                    background-color: hsla(9, 15%, 97%, 1);
                }
            </style>
        ';
        echo isset($this->all()[$key][0]) ? '<div class="msg error">' . ucfirst($this->all()[$key][0]) . '</div>' : false;
    }
}