<?php

class Categories extends Model{
    const PER_PAGE = 5;
    public  function  getList(){
        $sql = "SELECT * FROM category";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM category WHERE  id_category = '{$id}' LIMIT 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getByAlias($alias, $page = null){
        $page = (int)$page;
        if($page == null){
            $offset = 1;
        }else{
            $offset = $page * 2 - 2;
        }

        $sql = "SELECT n.title_news, c.name_category, n.id_news
                FROM news n
                JOIN category c
                on n.id_category = c.id_category
                WHERE  n.id_category = '{$alias}'
                 ORDER BY n.data_news
                 LIMIT $offset, 2";
        return $this->db->query($sql);
    }

    public function getByCount($id){
        $id = (int)$id;
        $sql = "SELECT COUNT(id_news) AS count_news
                FROM news
                WHERE  id_category = '{$id}'";
        $count_news = $this->db->query($sql);
        $count_news = $count_news[0]['count_news'];
        return $count_news;
    }


    public function getByCategories($id){
        $id = (int)$id;
        $sql = "SELECT c.name_category, n.title_news, c.id_category, n.id_news
                FROM news n
                JOIN category c
                ON n.id_category = c.id_category
                WHERE  c.id_category = '{$id}'
                ORDER BY n.data_news
                LIMIT 5
                ";
        return $this->db->query($sql);
    }

    public function getCountPage(){
        $sql = "SELECT COUNT(*) AS count_news FROM news";
        $res = $this->db->query($sql);
        //$res = $res->teach_assos();
        $count_page = ceil($res['count_news'])/PER_PAGE;
        return $count_page;
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
    public function save($data, $id = null){
        if(!isset($data['name_category'] )){
            return false;
        }

        $name_category = $this->db->escape($data['name_category']);

        if(!$id){
            $sql = "
                INSERT INTO category
                  SET name_category = '{$name_category}'
            ";
        }else{
            $sql = "
                UPDATE category
                  SET name_category = '{$name_category}'
                  WHERE id_category = '{$id}'
            ";
        }
        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "DELETE FROM category WHERE id_category = {$id}";
        return $this->db->query($sql);
    }
}

