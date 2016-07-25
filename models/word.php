<?php

class Word extends Model
{

    public function  getSearch($word)
    {
        $sql = "SELECT id_news, title_news FROM news
                WHERE title_news LIKE '%{$word}%'
                OR content_news LIKE '%{$word}%' " ;

        return $this->db->query($sql);
    }
}