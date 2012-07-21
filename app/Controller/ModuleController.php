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
            //$this->redirect ( array('controller' => 'Instructions', 'action' => 's'.$this->Session->read( 'activity' ) ) );

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


        //$this->set( $this->timeSetup($minutes) );
        $this->set( $this->timeSetup(1) );
        

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


        //$this->set( $this->timeSetup( 4 ) );
        $this->set( $this->timeSetup(1) );
    }

    public function review(){
        //get the number correct and the payment for display
    }

    private function timeSetup($minutes = 2, $nextPage = 'traffic'

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
                                    'correct' => $correct,
                                    'answered' => $this->data['Q1']['answer']
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

        //print_r($numbers);
        return $data;

    }
    public function robotsPair(){
        $this->loadModel('RobotLink');

        $userArray = array(2567,37,587,903,6455,7,387,65654,453,47,6,364,65,23,676,234,6556,345,87,56);

        //$data = array('user_id' => '',
                    //    'robot_rank' => '');

        foreach ( $userArray as $user ){
            $data[] = array(
                'user_id' => $user,
                'robot_rank' => rand(1, 100));
        }
       // debug($data);
        debug($this->RobotLink->saveMany($data));



        echo 'ok';
    }
    public function rank(){
        $this->loadModel('Rank');


    }
}

/*
 * rateSelection - Assigns the way wages are calculated for each user.
 *   In the study, there are two main options:
 *    1) Users get to choose whether they would like piece-rate or team-rate.
 *    2) Users are randomly assigned to piece-rate or team-rate.
 *   This method will, if given a mapping of user-IDs to rates, assign them
 *   accordingly.  Otherwise, if the mapping is not provided as an argument,
 *   this function will randomly assign all unassigned userIDs to either piece
 *   or team rate (with a uniform probability). 
 */
private function rateSelection($choices = array()){
  $this->loadModel('Login');
  $this->loadModel('Study');
  $this->loadModel('Variable');

  $logins = $this->Login->getCurrentParticipants();

  // Check to see if we are assigning, or if the users chose:
  if (count($choices) == 0){
    // We are choosing for the users randomly:
    foreach $login ($logins){
        // Choose a number, 0 or 1:
        // 0 == piece-rate, 1 == team-rate
        $choices[$login] = rand(0,1);
    }
  } 

  // Load the data:
  foreach $login ($logins){
    $this->Login->setRate($login, $choices[$login]);
  }
}

/*
 * This method will partition the current participants into team pairings.
 */
private function createTeams(){
  $this->loadModel('Login');
  $this->loadModel('Study');
  $this->loadModel('Variable');

  $logins = $this->Login->getCurrentParticipants();
  $n1 = 0;
  $n2 = 0;

  // First check the total number of piece-rate(n1) and team-rate (n2) 
  // participants.
  foreach $login ($logins){
    // Get the rate of this login:
    $params = array(
        'conditions' => array('Login.id' => $login) //array of conditions
    )
    $loginEntry = $this->Login->find('first',$params);
    if ($loginEntry->Login['rate'] == 'piece'){
      $n1++;
    } else if ($loginEntry->Login['rate'] == 'team'){
      $n2++;
    }
  }
}

?>
