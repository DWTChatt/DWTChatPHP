<?php
require_once ROOT_DIR . '\ViewEngine\lib\Twig\Autoloader.php';
class Load
{
    public static function view($fileName, $data = array()){
        $fileNameArray = explode('.', $fileName);
        $file = 'Applications/Views/' . $fileNameArray[0] . '.nt';
        if(isset($fileNameArray[1]) == 'nt') {
            if (file_exists($file)) {
                Twig_Autoloader::register();
                $cache = CACHE ? 'Applications/Cache' : false;
                $NTView = new Twig_Environment(new Twig_Loader_Filesystem('Applications/Views'), array('cache' => $cache));
                $view = $NTView->loadTemplate($fileName);
                echo $view->render($data);
            }else {
                echo Error::show('Belirtilen görüntü dosyası yüklenemedi.');
            }
        }else {
            $file = 'Applications/Views/'.$fileName . '.view.php';
            if (file_exists($file)) {
                if ($data == true) {
                    extract($data);
                }
                require $file;
            }else {
                echo Error::show('Belirtilen görüntü dosyası yüklenemedi.');
            }
        }
    }
    public static function model($modelName){
        $file = 'Applications/Models/'.$modelName.'.php';
        if (file_exists($file)) {
            require $file;
            return new $modelName();
        }else {
            echo Error::show('Belirtilen model bulunamadı.');
        }
    }
}