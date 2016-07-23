<?php
class RetrouveController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new RetrouveN();
    }


    public function index(){
        $this->data['category'] = $this->model->getCategory();

        if( $_POST ){
            $this->data['retrouve'] =  $_POST;
            if($_POST){
                //Router::redirect('/admin/category/');
                $this->data['retrouve_n'] = $this->model->save($_POST);
            }
        }
    }
}
