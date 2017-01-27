<?php
trait Classes
{
    public $image;
    public $errorHandler;
    public $validator;
    public $assets;
    public function __construct() {
    	$this->ajax = new Ajax();
        $this->image = new Upload();
        $this->errorHandler = new ErrorHandler();
        $this->validator = new Validator($this->errorHandler);
        $this->assets = new Assets();
        $this->assets->createAssetsGroup('home')
            ->createAsset('nt','css', STYLES_DIR . '/nt.css',0)
            ->createAsset('style','css', STYLES_DIR . '/style.css',1,1)
            ->createAsset('roboto','font','https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese',2,0)
            ->createAsset('jquery','js','https://code.jquery.com/jquery-1.6.min.js',3,0)
            ->createAsset('home','js', SCRIPTS_DIR . '/home.js',5,2);

        $this->assets->createAssetsGroup('chat')
            ->createAsset('beta','css', STYLES_DIR . "/beta.css", 'beta',1)
            ->createAsset('emojiCSS','css', STYLES_DIR . "/emojionearea.css", 'emojiCSS' , 5)
            ->createAsset('betaJS', 'js', SCRIPTS_DIR . "/beta.js", 'betaJS', 2)
            ->createAsset('emojiJS', 'js', SCRIPTS_DIR . "/emojionearea.js", 'emojiJS', 3 )
            ->createAsset('emoji', 'js-inline', SCRIPTS_DIR . '/emoji.js', 'emoji', 5);
    }
}