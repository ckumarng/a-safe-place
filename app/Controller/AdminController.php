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
            if ( $this->data['StudySet']['group'] == 0 )
                $group = 'select';
            elseif ( $this->data['StudySet']['group'] == 1 )
                $group = 'no-select';
            else
                $group = ' ';

            $studyID = $this->Study->newStudy(array_unique( explode(',', $this->data['StudySet']['users']) ),$group);
            if ($studyID)
                $this->Variable->addVariable('currentStudy',$studyID);
        }
        $vars = $this->Variable->getVariables( array('currentStudy','three'));
        $study = $this->Study->getStudy($vars['currentStudy']);

        $this->set( array(
                'studyID' =>  $study['id'],
                'studyTime' => $study['date'],
                'treatment' => $study['treatment_group'],
                'participants' => $study['participants'],
            )
        );


    }
}
?>