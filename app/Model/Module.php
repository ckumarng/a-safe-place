<?php


class Module extends AppModel {
    var $actsAs = array('Containable');


    function newModule( $info ){
        $new = $this->save( $info );
        return $new['Module']['id'];



    }
    function isComplete($module, $id){
        $this->find('first',
                array(
                    'conditions' =>  array(
                        'Module.module' => $module,
                        'Module.user' => $id
                        ),
                    'fields' => array('Module.complete')
                    )
                );
    }
    public function saveData( $userID, $data ){
         $this->id = (int) $userID;
         return $this->save( $data );
    }
}
?>
