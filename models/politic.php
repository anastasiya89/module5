<?php

class Politic extends Model{

    public function getList(){
        $sql = "SELECT *, n.title_news FROM coments c JOIN news n
                ON n.id_news = c.news_id
                WHERE c.id_category = '5'";
        return $this->db->query($sql);
    }

    public function save($data){
        $sel = "SELECT id_coments FROM coments WHERE id_category = '5'";
        $id_coments= $this->db->query($sel);

        foreach($id_coments as $arr_id){
            foreach($arr_id as $id){
                if (isset($data['is_published'][$id])) {
                    $val = 1;
                    $sql = "
                     UPDATE coments
                      SET is_published = '{$val}'
                      WHERE id_coments = '{$id}'
                   ";
                    $this->db->query($sql);
                }else{
                    $val = 0;
                    $sql = "
                     UPDATE coments
                      SET is_published = '{$val}'
                      WHERE id_coments = '{$id}'
                   ";
                    $this->db->query($sql);
                }
            }
        }
        return true;
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "delete FROM coments where id_coments={$id}";
        return $this->db->query($sql);
    }
}