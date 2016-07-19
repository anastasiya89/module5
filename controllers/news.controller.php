<?php

class NewsController extends Controller{
    public $count_people;
    public static $count_people_read;

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Newses();
    }

    public function index(){
        $this->data['news'] =  $this->model->getList();
        //$this->data['pages']['menu'] = $this->model->getMenu();

    }

    public function view(){
        //$this->data['pages']['menu'] = $this->model->getMenu();
        $params = App::getRouter()->getParams();
        if(isset($params[0])){
            $id = strtolower($params[0]);
            $this->data['news'] = $this->model->getById($id);
            $this->data['news']['coments'] = $this->model->getComents($id);
            $this->data['news']['answer'] = $this->model->getAnswer($id);

           // echo "<pre>";
            //print_r($this->data['news']);


            if($_POST['save']){
                if($_POST){
                    //id_user = Session::get('login');
                    $id_user = Session::get('login');
                    $result = $this->model->saveComent($_POST, 5, $id);
                    if ($result){
                        Session::setFlash('Страница была сохранена');
                    }else{
                        Session::setFlash('Ошибка!');
                    }
                    Router::redirect($id);
                }
            }elseif($_POST['cancel']){
                Router::redirect($id);
            }

            if($_POST['answer']){
                if($_POST){
                    //id_user = Session::get('login');
                    //id_user = Session::get('login');
                    $result = $this->model->saveAnswer($_POST,$id_user, $id);
                    if ($result){
                        Session::setFlash('Страница была сохранена');
                    }else{
                        Session::setFlash('Ошибка!');
                    }
                    Router::redirect($id);
                }
            }elseif($_POST['cancel']){
                Router::redirect($id);
            }

        }
    }

    public function admin_index(){
        $this->data['news'] = $this->model->getList();

    }

    public function admin_add(){
        $this->data['category'] = $this->model->getByСategories();
        if($_POST['save']){
            if($_POST){
                $result = $this->model->save($_POST,$_FILES);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/news/');
            }
        }elseif($_POST['cancel']){
            Router::redirect('/admin/news/');
        }
    }

    public function admin_edit(){
        $this->data['category'] = $this->model->getByСategory();
        if(isset($this->params[0])){
            $this->data['news'] = $this->model->getById($this->params[0]);
        }else{
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/news/');
        }
        if($_POST['save']){
            if($_POST){
                $id = $this->data['news']['id_news'];

                $result = $this->model->save($_POST,$_FILES, $id);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/news/');
            }

        }elseif($_POST['cancel']){
            Router::redirect('/admin/news/');
        }
    }

    public function admin_delete(){
        if(isset($this->params[0])){
            $result = $this->model->delete($this->params[0]);
            if ($result){
                Session::setFlash('Страница была удалина');
            }else{
                Session::setFlash('Ошибка!');
            }
        }
        Router::redirect('/admin/news/');
    }
}