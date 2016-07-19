<?php

class Page extends Model{

    public  function  getList($only_published = false){
        $sql = "SELECT c.user_id, u.login, COUNT( user_id )
                FROM coments c
                JOIN users u
                ON c.user_id = u.id_user
                GROUP BY c.user_id";

        if($only_published){
            $sql .= "and is_published = 1";
        }
        return $this->db->query($sql);
    }

    public function getByAlias($id){
        $sql = "SELECT c.content_coments, c.data_coment, u.login
                FROM `coments` c
                JOIN users u
                ON c.user_id = u.id_user
                WHERE user_id = {$id} ";
        return $this->db->query($sql);
    }

    public function getTopNews(){
        //$data_coment = date('Y-n-j');
        $sql = "SELECT n.title_news, c.data_coment, c.content_coments, c.news_id,
                COUNT(c.news_id) as count_news
                FROM coments c
                JOIN news n ON c.news_id = n.id_news
                WHERE c.data_coment =  '2016-07-14'
                GROUP BY c.news_id
                ORDER BY count_news DESC
                LIMIT 3";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT *
                    FROM menu WHERE  id = '{$id}' limit 1";
        $result =$this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function getMenu(){
        $sql = "SELECT id, alias, id_category_menu FROM menu ";
        $sel = $this->db->query($sql);
        foreach($sel as $arr){
            if($arr['id'] == $arr['alias']){
                $menu[] = $this->arrMenu($arr['id'],$sel);
            }
        }
        return $menu;
    }


    public function getListPages(){
        $sql = "SELECT id, alias, id_category_menu FROM menu ";
        "select m.id,
                    m.title,
                    m.alias,
                   m2.title AS title_category_menu,
                    m.is_published,
                    m.id_category_menu
                    FROM menu m
                    left JOIN menu m2 ON  m.id_category_menu = m2.id";
        return $this->db->query($sql);
    }

    public function arrMenu($id, $arr){
        foreach($arr as $val){
            if($id == $val['id_category_menu']){
                $menu[$id][$val['alias']] = $val['title'];
            }
        }
        return $menu[$id];
    }

    public function getAdminMenu(){
        $sql = "SELECT id, title, alias, id_category_menu FROM menu GROUP BY id_category_menu";
        $sel = $this->db->query($sql);
        return $sel;
    }

    public function save($data, $id = null){
        if(!isset($data['alias'])){
            return false;
        }

        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $id_category_menu = $this->db->escape($data['id_category_menu']);
        $is_published = isset($data['is_published']) ? 1 : 0;

        if( !$id){
            $sql = "
                insert into menu
                  set alias = '{$alias}',
                      title = '{$title}',
                      id_category_menu = '{$id_category_menu}',
                      is_published = '{$is_published}'
            ";
        }else{
            $sql = "
                update menu
                  set
                      alias = '{$alias}',
                      title = '{$title}',
                      id_category_menu = '{$id_category_menu}',
                      is_published = '{$is_published}'
                  where id = '{$id}'
            ";
        }

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "delete FROM menu where id={$id}";
        return $this->db->query($sql);
    }
}