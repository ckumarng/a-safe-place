<?php

class TrafficController extends AppController {
    public $helpers = array( 'Session' );


    function beforeFilter(){
        $this->LoginCheck();



    }

    public function index() {
        $activity = (int) $this->Session->read( 'activity' );

       if( $activity == -1 )
        $this->redirect( array('controller' => 'ThankYou') );

        if ( ! $this->seenInstructions() )
            $this->redirect ( array('controller' => 'Instructions', 'action' => 's'.$this->Session->read( 'activity' ) ) );

        //if (  $activity == 0 )
            //   $activity = 1;
        if ( $this->Session->check('doneTime') ) {
            if( $this->Session->read( 'doneTime' ) < time() ) {

                $this->dataProcess();

                $this->Session->delete( 'doneTime' );
                $this->Session->delete( 'qid' );
                $this->Session->delete( 'questionID' );
                $this->Session->delete( 'SeenIt' );

                $activity = $activity + 1;
                $this->Session->write( 'activity', $activity );
            }

        }

        //$nextActivity = 1;

        // $this->Session->write('activity', $nextActivity );

       // echo $this->activity_order[$activity];

        if ( $activity <= count( $this->activity_order ) ){
            $this->redirect( array(
                                'controller' => 'Module',
                                'action' => $this->activity_order[$activity]
                            )
                    );
        } else {
            $this->Session->write( 'activity', -1 );
            $this->loadModel( 'Login' );
            $this->Login->setComplete( $this->Session->read( 'pid' ) );
            $this->redirect( array('controller' => 'ThankYou') );
        }

    }
    private function dataProcess( $activityNumber = -1 ){
        if ( $activityNumber == -1 )
            $activityNumber = $this->Session->read( 'activity' );

        switch ( $activityNumber ) {
            case -1:
                return false;
                break;
            case 1:
                return $this->firstStudyProcessor();
                break;
            default :
                return false;
                break;
        }
    }
    private function firstStudyProcessor(){
        $this->loadModel('Module');

        $this->Module->saveData($this->Session->read('qid'), array(
            'correct' => $this->Session->read('questionID') - 1,
            'completed' => 1,
            'payment' => 0
        ));
        return true;
    }
        private function seenInstructions(){
        if ( $this->Session->check('SeenIt') )
            return true;
        else
            return false;
    }

}
?>
