<?php

class TrafficController extends AppController {
    public $helpers = array( 'Session' );
    public function index() {
        $activity = (int) $this->Session->read( 'activity' );
        //if (  $activity == 0 )
            //   $activity = 1;

        if( (int) $this->Session->read( 'complete' ) == 1 )  {

        $this->Session->delete( 'doneTime' );
        $this->Session->delete( 'qid' );

            $nextActivity = $activity + 1;
        } else {
            $this->redirect( array(
                                'controller' => 'module',
                                'action' => $this->activity_order[$activity]
                                )
                            );
        }

        //$nextActivity = 1;

        // $this->Session->write('activity', $nextActivity );

        if ( $nextActivity <= count( $this->activity_order ) ){
            $this->Session->write( 'activity', $nextActivity );
            $this->redirect( $this->activity_order[$nextActivity] );
        } else {
            $this->Session->write( 'activity', -1 );
            $this->redirect( array('controller' => 'login') );
        }
    }
}
?>
