<?php
class Cookie
{
	public static function get($str){
		return $_COOKIE[$str];
	}
	public static function set($key, $value, $time = 0, $path = '', $domain = '', $secure = false, $http = false) {
		setcookie($key, $value, $time, $path, $domain, $secure, $http);
	}
	public static function destroy($key = null){
		if($key == null){
			$_COOKIE = array();
		}else {
			unset($_COOKIE[$key]);
		}
	}
	public static function setArray($arr){
		foreach ($arr as $key => $value) {
			$_COOKIE[$key] = $value;
		}
	}
	public static function getAll(){
		$data = [];
		foreach ($_COOKIE as $key => $value){
			$data[] = array('key' => $key, 'value' => $value);
		}
		return $data;
	}
	public static function getRegEXFromKey($pattern){
		foreach($_COOKIE as $key => $value){
			if (preg_match($pattern,$key)){
				return array('key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromKey($pattern){
		$data = array();
		foreach($_COOKIE as $key => $value){
			if (preg_match($pattern,$key)){
				$data[] = array('key' => $key, 'value' => $value);
			}
		}
		return $data;
	}
	public static function getRegEXFromValue($pattern){
		foreach($_COOKIE as $key => $value){
			if (preg_match($pattern,$value)){
				return array( 'key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromValue($pattern){
		$data = array();
		foreach ($_COOKIE as $key => $value){
			if (preg_match($pattern, $value)){
				$data[] = array('key' => $key, 'value' => $value);
			}
		}
		return $data;
	}
	public static function getRegEXFromAll($pattern){
		foreach($_COOKIE as $key => $value){
			if (preg_match($pattern,$key)){
				return array('key' => $key, 'value' => $value);
			}
			if (preg_match($pattern,$value)){
				return array( 'key' => $key, 'value' => $value);
			}
		}
	}
	public static function getRegEXAllFromAll($pattern){
		$data = array();
		foreach ($_COOKIE as $key => $value){
			if (preg_match($pattern, $key)){
				$data[] = array('key' => $key, 'value' => $value);
			}
			if (preg_match($pattern, $value)){
				if(array_search(array('key' => $key, 'value' => $value), $data) === FALSE) {
					$data[] = array('key' => $key, 'value' => $value);
				}
			}
		}
		return $data;
	}
	public static function issetCookie($str){
		if(isset($_COOKIE[$str])){
			return true;
		}else {
			return false;
		}
	}
}