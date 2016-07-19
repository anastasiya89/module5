<?php

class View{

    protected $data;
    protected $path;
    public $new_news;
    public $design;
    public $banners;
    public $menu;

    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){
            return false;
        }

        $controller_dir = $router -> getController();
        $template_name = $router -> getMethodPrefix().$router->getAction().'.html';
        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(), $path = null, $new_news = null, $design= null, $banners= null){

        if(!$path){
            $path = self::getDefaultViewPath();
        }
        if(!file_exists($path)){
            throw new Exception('Template file is not'.$path);
        }
        $this -> path =$path;
        $this -> data =$data;
        $this -> new_news =$new_news;
        $this -> design =$design;
        $this -> banners =$banners;

    }

    public function render(){
        $data = $this->data;

        ob_start();
        include($this->path);

        $content = ob_get_clean();
        //$menu = ob_get_clean();
        //$this->menu();
        return $content;
    }

    public function menu(){
        $data = $this->data;

        $menu = $data['pages']['menu'];
        return $menu;
    }

    public function getNewNews(){
        $new_news = $this->new_news;
        return $new_news;
    }

    public function getDesign(){
        $design = $this->design;
        return $design;
    }

    public function getBanners(){
        $banners = $this->banners;
        return $banners;
    }

    public function getMenu(){
        $menu = $this->menu;
        return $menu;
    }
}