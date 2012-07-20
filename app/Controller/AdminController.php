<?php
class AdminController extends AppController {


    public function beforeFilter() {
        parent::beforeFilter();
        $this->LoginCheck();
    }
    public function index(){

    }
}
?>