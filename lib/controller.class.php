<?php

class Controller{

    protected $data;
    protected $model;
    protected $params;
    public $new_news;
    public $design;
    public $banners;
    public $menu;

    public function getData(){
        return $this->data;
    }

    public function getModel(){
        return $this->model;
    }

    public function getParams(){
        return $this->params;
    }

    public function getNewNews(){
        return $this->new_news;
    }

    public function getDesign(){
        return $this->design;
    }

    public function getBanners(){
        return $this->banners;
    }

    public function getMenu(){
        return $this->menu;
    }

    public function __construct($data = array()){
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
        $new_news_obj = new Model();
        $this->new_news = $new_news_obj->getNewNews();
        $this->design = $new_news_obj->getDesign();
        $this->banners = $new_news_obj->getBanners();
        $this->menu = $new_news_obj->getMenu();
    }
}