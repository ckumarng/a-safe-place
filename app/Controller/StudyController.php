<?php
class StudyController extends AppController {
    public $helpers = array('Html', 'Form');
    //public $timeTaken = 0;
//    function StudyController(){
//       //
//    }
	public function index(){

            //$this->set('posts', $this->Post->find('all'));
            //for displaying posts... not helpful
	// constructor function

	}
        function login(){

            if($this->request->is('post')){
                print_r($this->data['Login']['ID']);
                if( $this->data['Login']['ID'] != '' ){
                    //$this->Session->activate();
                    //print_r($this -> Session -> read());
                    if ($this->Session->started()){

                        //echo 'cool';
                        $this->Session->write ('pid',trim($this->data['Login']['ID']));

                    }
                    print_r($this -> Session ->error());
                }
            }


        }
        function admin(){

        }
        function firstStudy( $user_id = 0 ){
            echo 'Session_ID=';
            print_r($this->Session->read('pid'));
           // print_r($_SESSION);
            //echo debug($this->data);
            //$this->data['timeTaken'] = time() - (int) $this->data['Q1']['time'];
            //$timeNow = time();
            //$timeSent = $this->data['Q1']['time'];
            //echo $this->data['timeTaken'];
            echo $this->Study->id;
            if ($this->request->is('get')) {

            }
        }
                function time_elapsed($secs){
    $bit = array(
        'y' => $secs / 31556926 % 12,
        'w' => $secs / 604800 % 52,
        'd' => $secs / 86400 % 7,
        'h' => $secs / 3600 % 24,
        'm' => $secs / 60 % 60,
        's' => $secs % 60
        );

    foreach($bit as $k => $v)
        if($v > 0)$ret[] = $v . $k;

    return join(' ', $ret);
    }
}
?>
