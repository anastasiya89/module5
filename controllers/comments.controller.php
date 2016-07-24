<?php

class CommentsController extends Controller{
    public $count_people;
    public static $count_people_read;

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Comment();
    }

    public function admin_index(){
        $this->data['comment'] = $this->model->getList();
    }

    public function admin_add(){
        $this->data['news'] = $this->model->getByNews();
        $this->data['user'] = $this->model->getByUser();
        if($_POST['save']){
            if($_POST){
                $result = $this->model->save($_POST);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/comments/');
            }
        }elseif($_POST['cancel']){
            Router::redirect('/admin/comments/');
        }
    }

    public function admin_edit(){
        $this->data['news'] = $this->model->getByNews();
        $this->data['user'] = $this->model->getByUser();
        if(isset($this->params[0])){
            $this->data['comment'] = $this->model->getById($this->params[0]);
        }else{
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/comments/');
        }
        if($_POST['save']){
            if($_POST){
                $id = $this->data['id_comment'];
                $result = $this->model->save($_POST, $id);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/comments/');
            }

        }elseif($_POST['cancel']){
            Router::redirect('/admin/comments/');
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
        Router::redirect('/admin/comments/');
    }
}