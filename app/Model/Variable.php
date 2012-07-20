<?php

class Variable extends AppModel {
    public function getVariable( $key ){
       $found = $this->find('first', array(
                    'conditions' =>  array(
                        'Variable.key' => $key
                    ),
                    'fields' => array(
                        'value'
                    )

                )

            );
       if ( $found )
           return $found['Variable']['value'];
       return false;
    }
    public function getVariables( $keys ){
        $find = array();
       // foreach( $keys as $key ){
            $find['Variable.key'] = $keys;
        //}

       $found = $this->find('all', array(
                    'conditions' =>  $find
                ,
               'fields' => array('key','value')
                )
            );
       if ( ! $found )
           return false;
       $return = array();
       foreach ( $found as $f ){
           //print_r($f);
           $return[$f['Variable']['key']] = $f['Variable']['value'];
       }
       return $return;

    }
    public function addVariable( $key, $value ){
        $check = $this->getVariable($key);
        if( $check )
            $this->id = $check['Variable']['id'];
        //return true;
       return $this->save( array( 'key' => $key, 'value' => $value  ) );
    }
    public function removeVariable( $key ){
        $remove = $this->getVariable( $key );

        if( $remove )
            return $this->delete( (int) $remove['Variable']['id'] );
        else
            return false;
    }
}
?>
