<?php

class NextSectionController extends AppController {
    public $helpers = array('Session');
	public function index() {
            $this->Session->delete('doneTime');
            $nextActivity = (int) $this->Session->read('activity') + 1;
            //$nextActivity = 1;

           // $this->Session->write('activity', $nextActivity );


            if ( $nextActivity <= count($this->activity_order)){
                $this->Session->write('activity', $nextActivity );
           // echo $this->activity_order[$nextActivity];

            $this->redirect($this->activity_order[$nextActivity]);
            }
 else {
     $this->Session->write('activity', 0 );
     $this->redirect('/login');

     }

	}
}
?>
