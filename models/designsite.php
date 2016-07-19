<?php
class DesignSite extends Model{

    public function getList(){
        $sql = "SELECT * FROM design ";
        return $this->db->query($sql);
    }

    public  function save($data){
        $id = 1;
        $color_head = $data['color_head'];
        $color_container = $data['color_container'];

        $sql = "
            UPDATE design
            SET color_head = '{$color_head}',
            color_container = '{$color_container}'
            WHERE id= '{$id}'
          ";
        return $this->db->query($sql);
    }
}