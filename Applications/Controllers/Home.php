<?php
class Home extends Controller
{
	use Classes;
	public function index($lang = false, $color = 'white', $textColor = 'grey'){
		if($lang == false) {
			if(Cookie::issetCookie('lang')){
				Languages::setDefault(Cookie::get('lang'));
			}else {
				Languages::setDefault(DEFAULT_LANG);
			}
		}else {
			Languages::setDefault($lang);
		}
		$data = [];
		$data['lang']							=  Languages::getDefault();
		$data['title']      					= 'Neptune Framework - ' . Languages::show('Welcome');
		$data['neptune']    					= 'NEPTUNE';
		$data['BASE_URL']   					=  BASE_URL;
		$data['Turkish']						= Languages::show('Turkish');
		$data['English']						= Languages::show('English');
		$data['Arabic']							= Languages::show('Arabic');
		$data['framework']  					= 'FRAMEWORK';
		$data['version']    					= 'Alpha V3 Extreme';
		$data['copyright']  					= ' 2016 - 2017 Emirhan ENGIN & Mehmet Ali PEKER';
		$this->assets->assetsData 				= array();
		$this->assets->assetsData['color'] 		= $color;
		$this->assets->assetsData['textColor'] 	= $textColor;
		$checkedColor = explode('-',$color);
		if(isset($checkedColor[1])){
			$color = $checkedColor[0] . '_' . $checkedColor[1];
		}else {
			$color = $checkedColor[0];
		}
		if($color == 'white') { $data['logo']	= IMAGES_DIR . '/NTLogoDark.png'; }
		$data[$color]							= 'checked=checked';
		$data['head']       					= $this->assets->getAssetsGroup('home')->useAllAssets('css')->returnedData;
		$data['head']      					   .= $this->assets->getAssetsGroup('home')->useAllAssets('font')->returnedData;
		$data['body']							= $this->assets->getAssetsGroup('home')->useAllAssets('js')->returnedData;
		Load::view('home.nt', $data);
	}
	public function get(){
		echo '<style>';
		echo CSS::setDefaultColor(Cookie::get('color'));
		echo CSS::setDefaultTextColor(Cookie::get('textColor'));
		echo '</style>';
	}
	public function help(){
		echo Help::getHelp('Validator');
	}
}