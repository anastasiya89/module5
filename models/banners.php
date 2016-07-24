<?php

class Banners extends Model{

    public function getList(){
        $sql = "SELECT * FROM banners ";
        return $this->db->query($sql);
    }

    public function getById($id){
        $id = (int)$id;
        $sql = "SELECT * FROM banners WHERE  id_banner = '{$id}' LIMIT 1";
        $res = $this->db->query($sql);
        $res = $res[0];
        return $res;
    }

    public function save($data, $files = null, $id = 0){
        if(!isset($data['name_banner']) || !isset($data['company_name'] )
            || !isset($data['price_banner']) || !isset($data['site_banner'])
            || !isset($data['position'])){
            return false;
        }

        if(!empty($files)){
            if($files['img_news']['error'] == 0){
                if($files['img_news']['type'] == 'image/jpeg' ||
                    $files['img_news']['type'] == 'image/jpg' ||
                    $files['img_news']['type'] == 'image/gif' ||
                    $files['img_news']['type'] == 'image/bmp'
                ){
                    copy($files['img_news']['tmp_name'],'../webroot/img/banner/'.$files['img_banner']['name']);
                }
            }else{
                return false;
            }
        }

        $name_banner = $this->db->escape($data['name_banner']);
        $company_name = $this->db->escape($data['company_name']);
        $price_banner = $this->db->escape($data['price_banner']);
        $site_banner = $this->db->escape($data['site_banner']);
        $position = $this->db->escape($data['position']);
        $is_published = isset($data['published_banner']) ? 1 : 0;

        if($files['img_news']['name']) {
            $img_banner = $files['img_banner']['name'];
        }else{
            $img_banner = $this->db->escape($data['img_banner_h']);
        }


        if(!$id){
            $sql = "
                INSERT INTO banners
                  SET name_banner = '{$name_banner}',
                      company_banner = '{$company_name}',
                      price_banner = '{$price_banner}',
                      site_banner = '{$site_banner}',
                      img_banner = '{$img_banner}',
                      position_banner = '{$position}',
                      published_banner = '{$is_published}'
            ";
        }else{
            $sql = "
                UPDATE banners
                  SET name_banner = '{$name_banner}',
                      company_banner = '{$company_name}',
                      price_banner = '{$price_banner}',
                      site_banner = '{$site_banner}',
                      img_banner = '{$img_banner}',
                      position_banner = '{$position}',
                      published_banner = '{$is_published}'
                  WHERE id_banner = '{$id}'
            ";
        }

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        $sql = "DELETE FROM banners WHERE id_banner = {$id}";
        return $this->db->query($sql);
    }
}