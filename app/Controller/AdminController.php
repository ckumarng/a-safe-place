<?php
class AdminController extends AppController {


    public function beforeFilter() {
        parent::beforeFilter();
        $this->LoginCheck();
        $this->loadModel( 'Variable' );
        debug($this->data);
    }

    public function index(){
$this->loadModel( 'Study' );
        if( isset($this->data['StudySet'] ) ){

            $studyID = $this->Study->newStudy(array(1,2,3,4));
            if ($studyID)
                $this->Variable->addVariable('currentStudy',$studyID);
        }
        $vars = $this->Variable->getVariables( array('currentStudy','three'));
        $this->set('study',$this->Study->getStudy($vars['currentStudy']) );


    }
}
?>