<?php
class Study extends AppModel {
    var $name = 'Study';
   // var $hasMany = array( 'MyRecipe' => 'RandomNumber' );
    //var $hasAndBelongsToMany = array( 'Member' => 'Study' );


    function connector(){
        $this->RandomNumber->fill_table();
        //StudyController::reset();
    }
    function newStudy( $participants, $treatment = ' ' ){
        $participants = serialize($participants);
        $return = $this->save( array(
            'treatment_group' => $treatment,
            'participants' => $participants
            )
        );
        if ( $return )
            return $return['Study']['id'];
        return false;

    }
    function getStudy( $studyID ){
        $found = $this->find('first', array('conditions'=> array('Study.id' => $studyID)));
        if ( $found ) {
            $found['Study']['participants'] = unserialize($found['Study']['participants']);
            return $found['Study'];
        }
        return false;

    }
}
?>
