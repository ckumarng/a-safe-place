<?php
class StudyController extends AppController {
	public function index(){
	// constructor function
	}
	function session_setup(){
		
		$this->Session->startup($controller);
		
		$this->methods->requireLogin();
	}
	function session_excists(){
		
	}
	function is_logged_in(){
		
	}
}
?>
