<?php
class ModuleController extends AppController {

    var $name = 'Module';
    var $helpers = array('Html', 'Form','Session');
    var $timetaken = 0;
    var $questionID = 0;
    var $scaffold;

    /*
     * always check if they are logged in
     */
    function beforeFilter(){
        $this->LoginCheck();

        //if ( ! $this->seenInstructions() )
           // $this->redirect ( array('controller' => 'Instructions', 'action' => 's'.$this->Session->read( 'activity' ) ) );

    }
    private function seenInstructions(){
        if ( $this->Session->check('SeenIt') )
            return true;
        else
            return false;
    }
    /*
     * makes sure the user is on the correct activity
     */
    private function  activityCheck( $currentActivity ) {
        if ( $currentActivity == $this->Session->read( 'activity' ) )
            return true;
        else
            return false;
    }
    /*
     * creates a new activity in the database
     */
    function newActivity(){
        $this->loadModel('Variable');
        $study = $this->Variable->getVariable( 'currentStudy' );
        $activity = array (
            'module' => $this->Session->read('activity'),
            'user' => $this->Session->read('pid'),
            'study' => $study,
            'question' => 2
        );
        //echo 'this';
       // print_r ( $this->Module->newModule( $activity ) );
        $this->Session->write('qid',$this->Module->newModule( $activity ));

       //$this->redirect( array('controller' => 'Module') );
    }
//    public function index(){
//
//           //$this->Study->connector();
//            //$this->RandomNumbers->reset();
//         debug($this->data);
//
//	}
    /*
     *   firstStudy - Initiate the second study (first checking to see if the 
     *     user is logged in; if not, redirect to login page).
     */
    function firstStudy( $minutes = 2,
                            $nextPage = '../traffic'
    ){

        if( ! $this->Session->check('qid') )
            $this->newActivity();


        $this->set( $this->timeSetup($minutes) );
    }

    /*
     *   secondStudy - Initiate the second study (first checking to see if the 
     *     user is logged in; if not, redirect to login page).
     */
    function secondStudy( $minutes = 2,
                            $nextPage = '../traffic'
    ){

        if( ! $this->Session->check('qid') )
            $this->newActivity();


        $this->set( $this->timeSetup($minutes) );
    }

    public function review(){
        //get the number correct and the payment for display
    }

    private function timeSetup($minutes = 2,
                            $nextPage = '../traffic'
            ){

        //Load random number module
        $this->loadModel('RandomNumber');

        // Initialize the timer:
        $seconds = 60 * $minutes;  // Total # of seconds allowed
        $currentTime = time();     // The current time

        // Check if the time for the javascript counter is set
        if ( ! $this->Session->check('doneTime')) {
            $this->Session->write ('doneTime', $currentTime + $seconds);
        }

        // Initialize the question ID, if necessary:
        if ( ! $this->Session->check('questionID')) {
            $this->Session->write ('questionID', 1);
        }

        // REMOVE THIS:
        //  if ($this->Session->read('questionID') >= count($this->questionArray)){
        //     $this->Session->write ('questionID', 0);
        //     $this->Session->write ('completed', 1);
        // }

        // If a reset command is issued: where can this be done from?
        // this is if the reset button in the view is pressed
        // currently it resets the time back to the default
        // it should also reset the questionId for debugging sake
        if( isset($this->data['reset']) ) {
            $this->Session->write ('doneTime', $currentTime + $seconds);
            $this->Session->write ('questionID', 1);
        }

        // Check to see if time is already expired:
        $timedone = $this->Session->read('doneTime');

        // If $timedone is stale, renew it:
        if ($timedone  - $currentTime < 0  ){
            $this->Session->write ('doneTime', $currentTime + $seconds);
        }

        // Update timer:
        $timeleft = $timedone - $currentTime;

        #store question id
        $qid = $this->Session->read('questionID');


        // Check to see if the user has answered a question:
        if ( isset( $this->data['Q1'] ) && $this->data['Q1']['answer'] != '') {
            $correct = 0;
            $timeTaken = $currentTime - (int) $this->data['Q1']['time'];
            $realAnswer = (int)$this->data['Q1']['answer'];

            if ( $realAnswer == (int)$this->data['Q1']['first'] *
                            (int)$this->data['Q1']['second'] )
                $correct = 1;
            // Save answer inforamation to the model:
            $this->loadModel('Answer');
            $toSave = array ( 'Answer' =>
                            array (
                                    'module_id' => $this->Session->read('qid'),
                                    'question_id' => $qid,
                                    'time_taken' => $timeTaken,
                                    'correct' => $correct
                                )
                            );
            $this->Answer->save($toSave);

            $qid++;
            $this->Session->write('questionID', $qid);
        }

        // get our two numbers
        $numbers = $this->RandomNumber->getNumbers( $qid );

        // Send updated data to the view
        $data = array(
            'firstnum' => $numbers['RandomNumber']['first'],
            'secondnum' => $numbers['RandomNumber']['second'],
            'nextPage' => $nextPage,
            'timeleft' => $timeleft
        );

        print_r($numbers);
        return $data;

    }
}
?>
