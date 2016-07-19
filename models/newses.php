<?php

class Newses extends Model{

    public  function  getList($only_published = false){
        $sql = "SELECT * FROM news";
        if($only_published){
            $sql .= "and published_news = 1";
        }
        return $this->db->query($sql);
    }

    public function getByСategory(){
        $sql = "SELECT * FROM category";
        return $this->db->query($sql);
    }

    public function getByСategories(){
        $sql = "SELECT * FROM category";
        return $this->db->query($sql);
    }


    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM news WHERE  id_news = '{$id}' LIMIT 1";
        return $this->db->query($sql);
    }

    public function getComents($id){
        $id = (int)$id;
        $sql = "SELECT * FROM coments c
                JOIN users u
                ON c.user_id = u.id_user
                WHERE c.news_id = '{$id}'
                ORDER BY count_pluse DESC";

        return $this->db->query($sql);
    }


    public function getAnswer($id_news){
        $id_news = (int)$id_news;
        $sql = "SELECT * FROM answer_coments a
                JOIN users u
                ON u.id_user = a.id_user
                WHERE a.id_news = '{$id_news}'
                ORDER BY a.id_coments DESC";

        return $this->db->query($sql);
    }


    public function saveComent($data, $id_user, $id_news)
    {
        if (!isset($data['coment']) ){
            return false;
        }

        $coment = $data['coment'];
        $data_coment = date('Y-n-j');

            $sql = "
                INSERT INTO coments
                  SET content_coments = '{$coment}',
                      user_id = '{$id_user}',
                      news_id = '{$id_news}',
                      data_coment = '{$data_coment}'
            ";

        return $this->db->query($sql);
    }

    public function saveAnswer($data, $id_user, $id_news)
    {
        if (!isset($data['content_answer']) ){
            return false;
        }

        $content_answer = $data['content_answer'];
        $id_coments = $data['id_coments'];
        $data_answer = date('Y-n-j');

        $sql = "
                INSERT INTO answer_coments
                  SET content_answer = '{$content_answer}',
                      id_user = '{$id_user}',
                      id_coments = '{$id_coments}',
                      id_news = '{$id_news}',
                      data_answer = '{$data_answer}'
            ";

        return $this->db->query($sql);
    }
/*
    public function getMenu(){
        $sql = "SELECT id, title, id_category_menu, alias FROM pages ";
        $sel = $this->db->query($sql);
        foreach($sel as $arr){
            if($arr['id'] == $arr['id_category_menu']){
                $menu[] = $this->arrMenu($arr['id'],$sel);
            }
        }
        return $menu;
    }

    public function arrMenu($id, $arr){
        foreach($arr as $val){
            if($id == $val['id_category_menu']){
                $menu[$id][$val['alias']] = $val['title'];
            }
        }
        return $menu[$id];
    }
*/
    public function save($data, $files = null, $id = 0){
        if(!isset($data['content_news']) || !isset($data['title_news'] )
            || !isset($data['category_news']) || !isset($data['data_news'])){
            return false;
        }

        if(!empty($files)){
            if($files['img_news']['error'] == 0){
                if($files['img_news']['type'] == 'image/jpeg' ||
                    $files['img_news']['type'] == 'image/jpg' ||
                    $files['img_news']['type'] == 'image/gif' ||
                    $files['img_news']['type'] == 'image/bmp'
                ){
                    copy($files['img_news']['tmp_name'],'../webroot/img/upload/'.$files['img_news']['name']);
                }
            }else{
                return false;
            }
        }


        $title_news = $this->db->escape($data['title_news']);
        $data_news = $this->db->escape($data['data_news']);
        $id_category = $this->db->escape($data['category_news']);
        $content_news = $this->db->escape($data['content_news']);
        $img_news = $files['img_news']['name'];
        $is_published = isset($data['published_news']) ? 1 : 0;

        if(!$id){
            $sql = "
                INSERT INTO news
                  SET title_news = '{$title_news}',
                      data_news = '{$data_news}',
                      img_news = '{$img_news}',
                      content_news = '{$content_news}',
                      id_category = '{$id_category}',
                      published_news = '{$is_published}'
            ";
        }else{
            $sql = "
                UPDATE news
                  SET title_news = '{$title_news}',
                      data_news = '{$data_news}',
                      content_news = '{$content_news}',
                      id_category = '{$id_category}',
                      published_news = '{$is_published}'
                  WHERE id_news = '{$id}'
            ";
        }

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "DELETE FROM news WHERE id_news = {$id}";
        return $this->db->query($sql);
    }
}

