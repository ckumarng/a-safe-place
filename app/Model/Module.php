<?php


class Module extends AppModel {
    var $actsAs = array('Containable');
    var $currentModule;


    function newModule( $info ){
        $new = $this->save( $info );
        return $new['Module']['id'];



    }
    function isComplete($module, $userID){
        $this->find('first',
                array(
                    'conditions' =>  array(
                        'Module.module' => $module,
                        'Module.user' => $userID
                        ),
                    'fields' => array('Module.complete')
                    )
                );
    }
    public function saveData( $userID, $activityNumber, $data ){

         $this->id = (int) $this->getCurrentModule($activityNumber, $userID);
         return $this->save( $data );
    }
    public function getCurrentModule( $activityNumber, $userID ){
        $data =       $this->find('first',
                array(
                    'conditions' =>  array(
                        'Module.module' => $activityNumber,
                        'Module.user' => $userID
                        ),
                    'fields' => array('Module.id')
                    )
                );
        


        return $data['Module']['id'];
    }
}
?>
