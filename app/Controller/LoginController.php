<?php

class LoginController extends AppController {
    public $helpers = array('Html', 'Form','Session');

    public function index() {
        if( $this->request->is( 'post' ) ) {
            if( $this->data['Login']['ID'] != '' &&
                    $this->data['Login']['password'] == $this->password ) {

                $id = $this->Login->getUserID(trim($this->data['Login']['ID'] ));
                if( $id ) {
                    if ( $this->Login->isComplete( $id ) ){
                        $this->Session->write ( 'activity', -1 );
                        $this->redirect ( array('controller' => 'Traffic')  );
                    }

                $this->Session->write( 'pid',trim($this->data['Login']['ID'] ) );
                if ( ! $this->Session->check( 'activity' ) )
                    $this->Session->write ( 'activity', 1 );
                $this->redirect ( array('controller' => 'Traffic')  );
                }
            }
        }
        $this->set( 'login_id',$this->Session->read( 'pid' ) );
        $this->set('password' , $this->password); #for debuging only
    }
    public function reset() {
        $this->Session->delete( 'pid' );
        $this->Session->destroy();
        $this->redirect( array('controller' => '../Login') );
    }
}
?>
