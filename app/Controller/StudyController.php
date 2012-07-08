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


        }
        function admin(){

        }
        function firstStudy( $user_id = 0 ){
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
