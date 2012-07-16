<?php

class LoginController extends AppController {
    public $helpers = array('Html', 'Form','Session');

	public function index() {
       // debug($this->Session->read());
                        if($this->request->is('post')){
 //print_r($this->data);


                if( $this->data['Login']['ID'] != '' && $this->data['Login']['password'] == $this->password ){
                    //$this->Session->activate();
                    //print_r($this -> Session -> read());
                    //if ($this->Session->started()){

                        //echo 'cool';
                        //$this->Session->setFlash($thi);
                        $this->Session->write ('pid',trim($this->data['Login']['ID']));
                        if ( ! $this->Session->check('activity'))
                            $this->Session->write ('activity', 0);

                  // print_r($this -> Session ->error());

                    //}

                 //if (  $this->Session->check('pid'))
                    $this->redirect ('/traffic');


                }

            }
            $this->set('login_id',$this->Session->read('pid'));
	}
        public function reset(){

            $this->Session->delete('pid');
            $this->Session->destroy();
            $this->redirect('/login');
        }

}
?>
