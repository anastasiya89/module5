<?php

class CategoryController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Categories();
    }

    public function index(){
        $this->data['category'] =  $this->model->getList();

        foreach($this->data['category'] as $key => $category_id){
            $this->data['categories'][$key] =  $this->model->getByCategories($key+1);
        }
    }

    public function view(){
        $params = App::getRouter()->getParams();
       if(isset($params[0])){
           $alias = strtolower($params[0]);
           $this->data['category'] = $this->model->getByAlias($alias);
           $this->data['count_news'] = $this->model->getByCount($alias);

        }
    }

    public function admin_index(){
        $this->data['category'] = $this->model->getList();
    }

    public function admin_add(){
        if($_POST['save']){
            if($_POST){
                $result = $this->model->save($_POST);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/category/');
            }
        }elseif($_POST['cancel']){
            Router::redirect('/admin/category/');
        }
    }

    public function admin_edit(){
        if(isset($this->params[0])){
            $this->data['category'] = $this->model->getById($this->params[0]);
        }else{
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/category/');
        }
        if($_POST['save']){
            if($_POST){
                $id = $this->data['category']['id_category'];
                $result = $this->model->save($_POST,$id);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/category/');
            }

        }elseif($_POST['cancel']){
            Router::redirect('/admin/category/');
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
        Router::redirect('/admin/category/');
    }
}