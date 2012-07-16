<?php
class StudyController extends AppController {
    var $name = 'Study';
    var $helpers = array('Html', 'Form','Session');
    //public $timeTaken = 0;
//    function StudyController(){
//       //
//    }
    //var $uses = array('Timetaken');
    var $timetaken = 0;
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
	*/
        function firstStudy( $user_id = 0,
			     $minutes = 2,
			     $nextPage = 'http://localhost:8080/nextSection'
        ){
           // if ( ! $this->Session->check('pid'))
           //     $this->redirect ('/study/login');

            $this->loadModel('RandomNumber');
            //print_r($this->data);
           // debug($this->data);

           $seconds = 60 * $minutes;

           //$seconds = 15;

           // print_r($this->data);

           $currentTime = time();

           if ( ! $this->Session->check('doneTime')) {
                $this->Session->write ('doneTime', $currentTime + $seconds);
           }

           if( isset($this->data['reset']) ) {
                $this->Session->write ('doneTime', $currentTime + $seconds);
                $this->Session->write('questionSeries',0);
           }


            $timedone = $this->Session->read('doneTime');

            if ($timedone  - $currentTime < 0  ){

                $this->Session->write ('doneTime', $currentTime + $seconds);
            }


            if ( isset($this->data['Q1'])  )
                $timeTaken = $currentTime - (int) $this->data['Q1']['time'];
            else $timeTaken = 0;


           // echo $timedone;
          // echo TIME_START.':';


            //echo 'Session_ID=';
            //print_r($timedone);
           // print_r($_SESSION);
            //echo debug($this->data);
            //$this->data['timeTaken'] = time() - (int) $this->data['Q1']['time'];
            //$timeNow = time();
            //$timeSent = $this->data['Q1']['time'];
            //echo $this->data['timeTaken'];
            //echo $this->Study->id;
            if ($this->request->is('get')) {

            }

            $timeleft = $timedone - $currentTime;
            //$firstnum = rand(1, 9);
            //$secondnum = rand(21, 99);


            //echo "\n is correct?".$correct;

            //print_r($this->data['Q1'][$firstnum.' * '.$secondnum.' =']);
            //print_r($this->data['Q1']['answer']);


            if (isset($this->data['Q1'])) {

                $correct = (int)$this->data['Q1']['first']*(int)$this->data['Q1']['second'];


               echo $correct.':'.(int)$this->data['Q1']['answer'];

           if ( $correct == (int)$this->data['Q1']['answer'] )
            echo "\n CORRECT!";
            }


            if( $this->Session->check('questionSeries') )
                $i = $this->Session->read('questionSeries') + 1;
            else
                $i = 1;

            $this->Session->write('questionSeries',$i);


            $numbers = $this->RandomNumber->find('first', array('conditions' =>  array('RandomNumber.id' => $i)));


            $data = array(
                'firstnum' => $numbers['RandomNumber']['first'],
                'secondnum' => $numbers['RandomNumber']['second'],
                'nextPage' => $nextPage,
                'timeleft' => $timeleft
            );
            $this->set($data);



            //debug($numbers['RandomNumber']['first']);




        }
}
?>
