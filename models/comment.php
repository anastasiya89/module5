<?php

class Comment extends Model{

    public  function  getList(){
        $sql = "SELECT * FROM coments";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT c.*, u.login, n.title_news FROM coments c
        JOIN users u
        ON c.user_id = u.id_user
        JOIN news n
        ON c.news_id = n.id_news
        WHERE  c.id_coments = '{$id}' LIMIT 1";
        $res = $this->db->query($sql);
        $res = $res[0];
        return $res;
    }

    public function getByUser(){
        $sql = "SELECT id_user,login FROM users";
        return $res = $this->db->query($sql);
    }

    public function getByNews(){
        $sql = "SELECT id_news,title_news FROM news";
        return $res = $this->db->query($sql);
    }


    public function save($data, $id = 0){
        if(!isset($data['news_id']) || !isset($data['user_id'] )
            || !isset($data['data_coment']) || !isset($data['content_coments'])){
            return false;
        }
        //echo "<pre>";
        //print_r($data);

/*

        $title_news = $this->db->escape($data['title_news']);
        $data_news = $this->db->escape($data['data_news']);
        $id_category = $this->db->escape($data['category_news']);
        $content_news = $this->db->escape($data['content_news']);
        $is_published = isset($data['published_news']) ? 1 : 0;

*/
        $news_id = $this->db->escape($data['news_id']);
        $user_id = $this->db->escape($data['user_id']);
        $data_coment = $this->db->escape($data['data_coment']);
        $content_coments = $this->db->escape($data['content_coments']);
        $is_published = isset($data['is_published']) ? 1 : 0;

        if(!$id){
            $sql = "
                INSERT INTO coments
                  SET news_id = '{$news_id}',
                      user_id = '{$user_id}',
                      data_coment = '{$data_coment}',
                      content_coments = '{$content_coments}',
                      is_published = '{$is_published}'
            ";
        }else{
            $sql = "
                UPDATE coments
                  SET news_id = '{$news_id}',
                      user_id = '{$user_id}',
                      data_coment = '{$data_coment}',
                      content_coments = '{$content_coments}',
                      is_published = '{$is_published}'
                  WHERE id_coments = '{$id}'
            ";
        }

        return $this->db->query($sql);
    }


    public function delete($id){
        $id = (int)$id;
        $sql = "DELETE FROM coments WHERE id_coments = {$id}";
        return $this->db->query($sql);
    }
}

