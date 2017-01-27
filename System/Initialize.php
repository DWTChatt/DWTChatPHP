<?php

session_start();

require_once "Settings.php";
require_once AUTOLOADER_DIR . '/Autoloader.php';
Autoloader::run('./System/*');
if (CACHE == true && CACHE_TIME != null){
    $options = array(
        'time'   => CACHE_TIME,
        'dir'    => '../../Applications/Cache',
        'buffer' => true,
        'load'   => true,
        'extension' => ".ntcache",
    );
    $Cache = new sCache($options);
}