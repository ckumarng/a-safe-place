<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class InstructionsController extends AppController {
    var $helpers = array('Form','Html');
    public function beforeFilter() {
       // debug($data);
        if( $this->request->is( 'post' ) ) {
            $this->Session->write('SeenIt',true);
            $this->redirect( array('controller' => 'Traffic') );
        }

    }
    public function index() {

    }
    public function q1(){
        debug($data);
    }
    public function s1(){
    }
    public function s2(){
    }
    public function s3(){
    }
    public function s4(){
    }
    public function s5(){
    }
    public function s6(){
    }
    public function s7(){
    }
    public function s8(){
    }
    public function s9(){
    }
    public function s10(){
    }
    public function s11(){
    }
    public function s12(){
    }
}
?>
