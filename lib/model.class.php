<?php

class Model{
    protected $db;

    public  function __construct(){
        $this->db = App::$db;
    }

    public function getNewNews(){
        $sql = "SELECT title_news, data_news, img_news, content_news
                FROM news
                ORDER BY data_news
                DESC LIMIT 4";
        return $this->db->query($sql);
    }

    public function getDesign(){
        $sql = "SELECT color_head, color_container
                FROM design
                WHERE id= '1'";
        return $this->db->query($sql);
    }

    public function getBanners(){
        $sql = "SELECT * FROM banners";
        return $this->db->query($sql);
    }

    public function getMenu(){
        $sql = "SELECT * FROM menu";
        return $this->db->query($sql);
    }
}