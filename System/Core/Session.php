<?php
class Session
{
    use Classes;

    public function __construct()
    {
        session_start();
    }

    public static function get($str){
		return isset($_SESSION[$str]) ? $_SESSION[$str] : false;
	}
	public static function set($name, $value, $data = false){
		$_SESSION[$name] = $value;
		return isset($_SESSION[$name]) ? true : false;
	}
	public static function setArray($arr){
		foreach ($arr as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}
	public static function getAll(){
		return $_SESSION;
	}
	public static function getRegEXFromKey($pattern){
		foreach($_SESSION as $key => $value){
			if (preg_match($pattern,$key)){
				return array('key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromKey($pattern){
		$data = array();
		foreach($_SESSION as $key => $value){
			if (preg_match($pattern,$key)){
				$data[] = array('key' => $key, 'value' => $value);
			}
		}
		return $data;
	}
	public static function getRegEXFromValue($pattern){
		foreach($_SESSION as $key => $value) {
			if (preg_match($pattern,$value)){
				return array('key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromValue($pattern){
		$data = array();
		foreach ($_SESSION as $key => $value) {
			if (preg_match($pattern, $value)) {
				$data[] = array('key' => $key, 'value' => $value);
			}
		}
		return $data;
	}
	public static function getRegEXFromAll($pattern){
		foreach($_SESSION as $key => $value){
			if (preg_match($pattern,$key)){
				return array('key' => $key, 'value' => $value);
			}
			if (preg_match($pattern,$value)){
				return array('key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromAll($pattern){
		$data = array();
		foreach ($_SESSION as $key => $value){
			if (preg_match($pattern, $key)){
				$data[] = array('key' => $key, 'value' => $value);
			}
			if (preg_match($pattern, $value)){
				if(array_search(array('key' => $key , 'value' => $value),$data) == FALSE) {
					$data[] = array('key' => $key, 'value' => $value);
				}
			}
		}
		return $data;
	}
	public static function getToken(){
		return $_SESSION['token'];
	}
	public static function setToken()
	{
		$_SESSION['token'] = md5(uniqid(rand(), true));
		return isset($_SESSION['token']) ? true : false;
	}
	public static function exists($name){
		return (isset($_SESSION[$name])) ? true : false;
	}
	public static function delete($name){
		if (self::exists($name)){
			unset($_SESSION[$name]);
		}
	}
	public static function flash($name, $string = ''){
		if (self::exists($name)){
			$session = self::get($name);
			self::delete($name);
			return $session;
		}else {
			self::put($name, $string);
		}
	}
	public static function put($key, $value){
		return $_SESSION[$key] = $value;
	}
}