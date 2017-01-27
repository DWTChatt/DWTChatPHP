<?php
class Route
{
	public static function get($url, $callable){
		$scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
		$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
		$routeURL = isset($scriptName[1]) ? '/' . $scriptName[1] : '';
		$method = 'GET';
		$explodeCall = @explode('@', $callable);
		if(!empty($explodeCall)){
			if(!class_exists($explodeCall[0])){
				require 'Applications/Controllers/' . $explodeCall[0] . '.php';
			}
			$Method2 = $explodeCall[1];
			if(!class_exists($explodeCall[0])){
				echo Error::page404();
				return false;
			}else {
				$Controller =  new $explodeCall[0]();
				if(!method_exists($Controller,$Method2)){
					echo Error::page404();
					return false;
				}
			}
			$url3 =  @explode('/index.php',$url);
            if($routeURL != '/' && $routeURL != '/index.php') {
                $url = $routeURL . $url;
            }
			global $route;
			if (preg_match("~^$url$~ms", PATH, $param) && $route && METHOD == $method) {
				array_shift($param);
				call_user_func_array(array($Controller , $Method2) , $param);
				$route = false;
			}
		}
	}
	public static function post($url, $callable){
        $scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
        $routeURL = isset($scriptName[1]) ? '/' . $scriptName[1] : '';
        $method = 'POST';
        $explodeCall = @explode('@', $callable);
        if(!empty($explodeCall)){
            if(!class_exists($explodeCall[0])){
                require 'Applications/Controllers/' . $explodeCall[0] . '.php';
            }
            $Method2 = $explodeCall[1];
            if(!class_exists($explodeCall[0])){
                echo Error::page404();
                return false;
            }else {
                $Controller =  new $explodeCall[0]();
                if(!method_exists($Controller,$Method2)){
                    echo Error::page404();
                    return false;
                }
            }
            $url3 =  @explode('/index.php',$url);
            if($routeURL != '/' && $routeURL != '/index.php') {
                $url = $routeURL . $url;
            }
            global $route;
            if (preg_match("~^$url$~ms", PATH, $param) && $route && METHOD == $method) {
                array_shift($param);
                call_user_func_array(array($Controller , $Method2) , $param);
                $route = false;
            }
        }
	}
	public static function delete($url,$callable) {
        $scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
        $routeURL = isset($scriptName[1]) ? '/' . $scriptName[1] : '';
        $method = 'DELETE';
        $explodeCall = @explode('@', $callable);
        if(!empty($explodeCall)){
            if(!class_exists($explodeCall[0])){
                require 'Applications/Controllers/' . $explodeCall[0] . '.php';
            }
            $Method2 = $explodeCall[1];
            if(!class_exists($explodeCall[0])){
                echo Error::page404();
                return false;
            }else {
                $Controller =  new $explodeCall[0]();
                if(!method_exists($Controller,$Method2)){
                    echo Error::page404();
                    return false;
                }
            }
            $url3 =  @explode('/index.php',$url);
            if($routeURL != '/' && $routeURL != '/index.php') {
                $url = $routeURL . $url;
            }
            global $route;
            if (preg_match("~^$url$~ms", PATH, $param) && $route && METHOD == $method) {
                array_shift($param);
                call_user_func_array(array($Controller , $Method2) , $param);
                $route = false;
            }
        }
	}
	public static function put($url,$callable){
        $scriptName = explode('index.php', $_SERVER['SCRIPT_NAME']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
        $routeURL = isset($scriptName[1]) ? '/' . $scriptName[1] : '';
        $method = 'PUT';
        $explodeCall = @explode('@', $callable);
        if(!empty($explodeCall)){
            if(!class_exists($explodeCall[0])){
                require 'Applications/Controllers/' . $explodeCall[0] . '.php';
            }
            $Method2 = $explodeCall[1];
            if(!class_exists($explodeCall[0])){
                echo Error::page404();
                return false;
            }else {
                $Controller =  new $explodeCall[0]();
                if(!method_exists($Controller,$Method2)){
                    echo Error::page404();
                    return false;
                }
            }
            $url3 =  @explode('/index.php',$url);
            if($routeURL != '/' && $routeURL != '/index.php') {
                $url = $routeURL . $url;
            }
            global $route;
            if (preg_match("~^$url$~ms", PATH, $param) && $route && METHOD == $method) {
                array_shift($param);
                call_user_func_array(array($Controller , $Method2) , $param);
                $route = false;
            }
        }
	}
}