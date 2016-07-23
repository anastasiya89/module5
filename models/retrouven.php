
<?php

class RetrouveN extends Model{

    public function getCategory(){
        $sql = "SELECT id_category,name_category FROM category ";
        return $this->db->query($sql);
    }

    public  function save($data){

        if(strpbrk($data['teg'],',')){
            $teg = explode(',', $data['teg']);
        }else{
             $teg =   $data['teg'];
        }
        $category = $data['category'];
        $data_from = $data['data_from'];
        $data_to = $data['data_to'];

        $sql = "SELECT id_news, title_news, content_news
                FROM news
                WHERE
                ";
        if($category){
            $sql .="id_category = '{$category}' AND ";
        }

         if($data_from AND $data_to){
             $sql .=" data_news BETWEEN '{$data_from}' AND '{$data_to}' ";
         }elseif($data_from == true AND $data_to == false){
              $sql .=" data_news = '{$data_from} ' ";
         }

        if(is_array($teg)){
            foreach($teg as $key => $teg_val){
                $teg_val = trim($teg_val);
                if($key == 0)   {
                    $sql .="HAVING title_news LIKE '%$teg_val%' OR content_news LIKE '%$teg_val%' ";
                }else{
                    $sql .="OR title_news LIKE '%$teg_val%' OR content_news LIKE '%$teg_val%' ";
                }
            }
        }elseif(is_string($teg)){
            $sql .="HAVING title_news LIKE '%$teg%' OR content_news LIKE '%$teg%' ";
        }

        if(!$category){
             $sql =  substr($sql, 0, -4);
        }
        return $this->db->query($sql) ;
    }
}