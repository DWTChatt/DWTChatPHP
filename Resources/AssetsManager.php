<?php
$scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
if($scriptName[1] == 'Resources') { $scriptName[1] = '';}
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
define('ROOT_DIR', explode('/',realpath(dirname('../index.php')))[0]);
define('RESOURCES_DIR', BASE_URL . '/Resources');
define('STYLES_DIR', ROOT_DIR . '/Resources/Styles');
define('SCRIPTS_DIR', ROOT_DIR . '/Resources/Scripts');
define('IMAGES_DIR', RESOURCES_DIR . '/Images');

require "../System/Libraries/Assets/Assets.php";
require "../System/Libraries/Ajax/Ajax.php";
require "../System/Libraries/Upload/Upload.php";
require "../System/Libraries/Error/Error.php";
require "../System/Libraries/Validator/ErrorHandler.php";
require "../System/Libraries/Validator/Validator.php";
require "../System/Libraries/CSS/CSS.php";
require "../System/Core/Cookie.php";
require "../System/Core/Classes.php";

class AssetsManager
{
	use Classes;

	public function index()
	{
		if (isset($_GET['id'])) {
			//print_r($this->assets->assets);
			foreach ($this->assets->assets['group'][$this->assets->group] as $asset)
			{
				if(array_search($_GET['id'], $asset) !== FALSE ) {
					if(@$asset['type'] == 'js' OR @$asset['type'] == 'js-inline') {
						$exp = @explode(ROOT_DIR, @$asset['url']);
						//print_r($exp);
						if (isset($exp[1])) {
							header("Content-type: text/javascript");
							//echo $asset['url'];
							require $asset['url'];
							return true;
						}
					}else {
						$exp = @explode(ROOT_DIR, $asset['url']);
						//print_r($exp);
						if (isset($exp[1])) {
							header("Content-type: text/css");
							require $asset['url'];
							return true;
						} else {
							if (isset($asset['url'])){
								echo "@import url(" . @$asset['url'] . ")";
							}
						}
					}
				}
			}
		   if($asset['id'] == $_GET['id']) {
			   require $asset['url'];
		   }
		}
	}
}
$new = new AssetsManager();
$new->index();

