<?php
class StudyController extends AppController {

    var $name = 'Study';
    var $helpers = array('Html', 'Form','Session');
    var $timetaken = 0;
    var $questionID = 0;

    // Load the random number module:

   // function beforeFilter(){
//        parent::beforeFilter();
//        $this->loadModel('RandomNumber');
//        $this->questionArray = $this->RandomNumber->find('all',
//		array('order' => 'RandomNumber.id ASC'));
        //$this->LoginCheck();
   // }
    function beforeFilter(){
        $this->LoginCheck();

    }
    public function index(){

           //$this->Study->connector();
            //$this->RandomNumbers->reset();
         debug($this->data);

	}
	/*
	 firstStudy - This function handles moving the user through a series
		      of questions, tracking the time taken and progress.
		      The following general logic is implemented here:
	    * Check to see if the user is logged in; if not, redirect to
	      login page.
	    * Check to see if the timer is already running; if not, initialize
	      it in the session.
	    * Check to see if the question has been answered: if so, note the
	      answer and move on.

	*/
        function firstStudy( $minutes = 2,
			     $nextPage = '/traffic'
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
	       $this->Session->write ('questionID', 0);
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
                                          'module_id' => -1,
                                          'question_id' => $qid,
                                          'time_taken' => $timeTaken,
                                          'correct' => $correct
			              )
			       );
    	       $this->Answer->save($toSave);

               $qid++;
               $this->Session->write('questionID', $qid);
           }

           // Only get what we need
            $numbers = $this->RandomNumber->find('first', array('conditions' =>  array('RandomNumber.id' => $qid)));



           // Get the next pair of random numbers:

           //$firstnum = $this->questionArray[$qid]['RandomNumber']['first'];
          // $secondnum = $this->questionArray[$qid]['RandomNumber']['second'];

           // Send updated data to the view
           $data = array(
                'firstnum' => $numbers['RandomNumber']['first'],
                'secondnum' => $numbers['RandomNumber']['second'],
                'nextPage' => $nextPage,
                'timeleft' => $timeleft
           );
           $this->set($data);

        }


}


?>
