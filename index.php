<?php

$scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
if($scriptName[1] == 'index.php')
{
    $scriptName[1] = '';
}
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/' . $scriptName[1]);
define('APPLICATIONS_DIR', BASE_URL . '/Applications');
define('CONTROLLERS_DIR', APPLICATIONS_DIR . '/Controllers');
define('MODELS_DIR', APPLICATIONS_DIR . '/Models');
define('VIEWS_DIR', APPLICATIONS_DIR . '/Views');
define('ROUTES_DIR', APPLICATIONS_DIR . '/Routes');
define('SYSTEM_DIR', BASE_URL . '/System');
$autoload = explode('/', SYSTEM_DIR);
define('AUTOLOADER_DIR', $autoload[4] . '/Autoloader');
define('CACHE_DIR', BASE_URL . '/Cache');
define('CONFIG_DIR', BASE_URL . '/Config');
define('CORE_DIR', BASE_URL . '/Core');
define('EXTERNAL_DIR', BASE_URL . '/External');
define('HELP_DIR', BASE_URL . '/Help');
define('HELPERS_DIR', BASE_URL . '/Helpers');
define('LIBRARIES_DIR', BASE_URL . '/Libraries');
define('ROUTE_DIR', BASE_URL . '/Route');
define('PATH_EXTENS', PATH_SEPARATOR);
define('ROOT_DIR', realpath(dirname(__FILE__)));
define('RESOURCES_DIR', BASE_URL . '/Resources');
define('STYLES_DIR', ROOT_DIR . '/Resources/Styles');
define('SCRIPTS_DIR', ROOT_DIR . '/Resources/Scripts');
define('IMAGES_DIR', RESOURCES_DIR . '/Images');
define('METHOD', $_SERVER['REQUEST_METHOD']);
define('FB_ID', '377680875915788');
define('FB_SECRET',  '77e76c5772e88c7e1a93ec131e279c13');
$explode = @explode("?",$_SERVER['REQUEST_URI']);
if(!$explode)
{
	define('PATH', $_SERVER['REQUEST_URI']);

}
else
{
	define('PATH', $explode[0]);
}
$route = true;
require_once 'System/Initialize.php';
if (ROUTE_SYSTEM == true){
	require "System/Routes.php";
	if($route)
	{
		echo Error::page404();
		return false;
	}
}else {
	$app = new Application();
}