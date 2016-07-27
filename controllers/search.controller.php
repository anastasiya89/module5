<?php

class SearchController extends Controller
{
    public $count_people;
    public static $count_people_read;

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Word();
    }

    public function index()
    {
        if($_POST['bsearch']){
            if($_POST['word']){
                $word = $_POST['word'];
                $result = $this->model->getSearch($word);

                if ($result){
                    $this->data['search'] = $result;
                }else{
                    Session::setFlash('По вашему запросу ничего не найдено!');
                }
            }else{
                Session::setFlash('Введите слово');
            }
        }

    }
}