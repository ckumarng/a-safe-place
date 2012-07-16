<?php
class Study extends AppModel {
    var $name = 'Study';
    var $hasMany = array( 'MyRecipe' => 'RandomNumber' );
    var $hasAndBelongsToMany = array('Member' => 'Study');

    /*
    public $validate = array(
    'email' => array(
        'rule' => 'notEmpty'
    ),
    'password' => array(
        'rule' => 'notEmpty'
    )
    );

*/
    function connector(){
        //$this->

        $this->RandomNumber->fill_table();
        //StudyController::reset();
    }


    function new_study(){
            //Configure::write('study',array());
    }
}
?>
