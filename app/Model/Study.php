<?php
class Study extends AppModel {
 var $name = 'Study';
 var $hasMany = array( 'MyRecipe' => 'RandomNumber' );
 var $hasAndBelongsToMany = array('Member' => 'Study');

function Study(){

    //$this->RandomNumbers->reset();

}
//    function Study(){
//        $id = d;
//    }
       public $validate = array(
        'email' => array(
            'rule' => 'notEmpty'
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
    );

       function connector(){
           $this->RandomNumber->fill_table();
           //StudyController::reset();
       }


	function new_study(){
		Configure::write('study',array());
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
