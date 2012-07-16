<?php

class LoginController extends AppController {
    public $helpers = array('Html', 'Form','Session');

	public function index() {
       // debug($this->Session->read());
                        if($this->request->is('post')){
 //print_r($this->data);


                if( $this->data['Login']['ID'] != '' ){
                    //$this->Session->activate();
                    //print_r($this -> Session -> read());
                    //if ($this->Session->started()){

                        //echo 'cool';
                        //$this->Session->setFlash($thi);
                        $this->Session->write ('pid',trim($this->data['Login']['ID']));
                        if ( ! $this->Session->check('activity'))
                            $this->Session->write ('activity', 1);

                  // print_r($this -> Session ->error());

                    //}

                 //if (  $this->Session->check('pid'))
                    $this->redirect ('/traffic');


                }

            }
	}
        public function login(){
                        if($this->request->is('post')){
 //print_r($this->data);

                if( $this->data['Login']['ID'] != '' ){
                    //$this->Session->activate();
                    //print_r($this -> Session -> read());
                    if ($this->Session->started()){

                        //echo 'cool';
                        $this->Session->write ('pid',trim($this->data['Login']['ID']));
                        if ( ! $this->Session->check('activity'))
                            $this->Session->write ('activity', 1);

                  // print_r($this -> Session ->error());

                    }

                 //if (  $this->Session->check('pid'))
                    $this->redirect ('/traffic');


                }

            }
        }

}
?>
