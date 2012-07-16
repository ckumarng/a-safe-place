<?php
class StudyController extends AppController {

    var $name = 'Study';
    var $helpers = array('Html', 'Form','Session');
    var $timetaken = 0;
    var $questionID = 0;

    // Load the random number module:

    function beforeFilter(){
        parent::beforeFilter();
        $this->loadModel('RandomNumber');
        $this->questionArray = $this->RandomNumber->find('all',
		array('order' => 'RandomNumber.id ASC'));
    }



    public function index(){
           //$this->Study->connector();
            //$this->RandomNumbers->reset();
         debug($this->data);

          //  if ( ! $this->Session->check('pid'))
           //     $this->redirect ('/study/login');
           //
           //
            //$this->set('posts', $this->Post->find('all'));
            //for displaying posts... not helpful
	// constructor function

	}
        function login(){
            //if ( $this->Session->check('pid'))


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
                    $this->redirect ('/study/firstStudy');


                }

            }


        }

        function admin(){

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

        function firstStudy( $user_id = 0, 
			     $minutes = 2, 
			     $nextPage = 'http://localhost:8080/nextSection' 
        ){
	   // Check to see if the user has logged in:
           // if ( ! $this->Session->check('pid'))
           //     $this->redirect ('/study/login');


 	   // Initialize the timer:
           $seconds = 60 * $minutes;  // Total # of seconds allowed
           $currentTime = time();     // The current time

           if ( ! $this->Session->check('doneTime')) {
                $this->Session->write ('doneTime', $currentTime + $seconds);
           }

           // Initialize the question ID, if necessary:
           if ( ! $this->Session->check('questionID')) {
	       $this->Session->write ('questionID', 0);
           }

           // REMOVE THIS:
           if ($this->Session->read('questionID') >= count($this->questionArray)){
	       $this->Session->write ('questionID', 0);
	       $this->Session->write ('completed', 1);
           }

	   // If a reset command is issued: where can this be done from?
           if( isset($this->data['reset']) )
                $this->Session->write ('doneTime', $currentTime + $seconds);

	   // Check to see if time is already expired:
           $timedone = $this->Session->read('doneTime');

	   // If $timedone is stale, renew it:
           if ($timedone  - $currentTime < 0  ){
                $this->Session->write ('doneTime', $currentTime + $seconds);
           }

	   // Update timer:
           $timeleft = $timedone - $currentTime;
            
	   // Check to see if the user has answered a question:
           if (array_key_exists("Q1", $this->data) && isset($this->data['Q1'])) {
	       $correct = 0;
               $timeTaken = $currentTime - (int) $this->data['Q1']['time'];
               $realAnswer = (int)$this->data['Q1']['answer'];

               if ( $realAnswer == (int)$this->data['Q1']['first'] * 
			        (int)$this->data['Q1']['second'] )
                   $correct = 1;
               // Save answer inforamation to the model:
               $this->loadModel("Answer");
               $toSave = array ( "Answer" => 
                                array ( 
                                          "module_id" => -1,
                                          "question_id" => $this->Session->read('questionID') - 1,
                                          "time_taken" => $timeTaken,
                                          "correct" => $correct
			              )
			       );
    	       $this->Answer->save($toSave);
           }

           // Get the next pair of random numbers:
           $qid = $this->Session->read('questionID');
           $firstnum = $this->questionArray[$qid]["RandomNumber"]["first"];
           $secondnum = $this->questionArray[$qid]["RandomNumber"]["second"];

           // Send updated data to the view
           $data = array(
                'firstnum' => $firstnum,
                'secondnum' => $secondnum,
                'nextPage' => $nextPage,
                'timeleft' => $timeleft
           );
           $this->set($data);
           $this->Session->write('questionID', $qid + 1);
        }
}
?>
