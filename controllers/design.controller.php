<?php
class DesignController Extends Controller{

    public  function __construct( $data = array()){
        parent::__construct($data);
        $this->model = new DesignSite();
    }


    public function admin_index(){
        $this->data['color'] = $this->model->getList();
        if(isset($_POST['submit'])){

            $result = $this->model->save($_POST);
            if ($result){
                Session::setFlash('Страница была сохранена');
            }else{
                Session::setFlash('Ошибка!');
            }
            //Router::redirect('/admin/mycontacts');
        }
    }
}