<?php
class PoliticsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Politic();
    }

    public function admin_index(){
        $this->data = $this->model->getList();
    }


    public function admin_edit(){
        $this->data = $this->model->getList();
        if($_POST['save']){
            if($_POST){
                $result = $this->model->save($_POST);
                if ($result){
                    Session::setFlash('Страница была сохранена');

                }else{
                    Session::setFlash('Ошибка!');
                }
                Router::redirect('/admin/politics');
            }

        }elseif($_POST['cancel']){
            Router::redirect('/admin/politics');
        }
    }

    public function admin_delete(){
        if(isset($this->params[0])){
            $result = $this->model->delete($this->params[0]);
            if ($result){
                Session::setFlash('Пользователь был удален');
            }else{
                Session::setFlash('Ошибка!');
            }
        }
        Router::redirect('/admin/politics');
    }
}