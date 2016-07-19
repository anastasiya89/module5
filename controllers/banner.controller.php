<?php

class BannerController Extends Controller{

    public  function __construct( $data = array()){
        parent::__construct($data);
        $this->model = new Banners();
    }


    public function admin_index(){
        $this->data['banner'] = $this->model->getList();
    }

    public function admin_add(){
        //$this->data['banner'] = $this->model->getList();
        if($_POST['save']){
            if($_POST){
                $result = $this->model->save($_POST,$_FILES);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/banner/');
            }
        }elseif($_POST['cancel']){
            Router::redirect('/admin/banner/');
        }
    }

    public function admin_edit(){
        //$this->data['banner'] = $this->model->getList();
        if(isset($this->params[0])){
            $this->data['banner'] = $this->model->getById($this->params[0]);
        }else{
            Session::setFlash('Wrong page id.');
            Router::redirect('/admin/banner/');
        }
        if($_POST['save']){
            if($_POST){
                $id = $this->data['banner']['id_banner'];

                $result = $this->model->save($_POST,$_FILES, $id);
                if ($result){
                    Session::setFlash('Страница была сохранена');
                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/banner/');
            }

        }elseif($_POST['cancel']){
            Router::redirect('/admin/banner/');
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
        Router::redirect('/admin/banner/');
    }
}