<?php

class Variable extends AppModel {
    public function getVariable( $key, $returnKeys = false ){
       $found = $this->find('first', array(
                    'conditions' =>  array(
                        'Variable.key' => $key
                    ),

                )

            );
       if ( $found ){
           $return = array();
            if(strstr($found['Variable']['value'], 'a:'))
                $found['Variable']['value'] = unserialize ( $found['Variable']['value'] );

            if ( ! $returnKeys )
                return $found['Variable']['value'];

            $return[$found['Variable']['id']][$found['Variable']['key']] = $found['Variable']['value'];

            //print_r($return);
           return $return;
       }
       return false;
    }
    public function getVariables( $keys, $returnKeys = false ){
        $find = array();
       // foreach( $keys as $key ){
            $find['Variable.key'] = $keys;
        //}

       $found = $this->find('all', array(
                    'conditions' =>  $find
                )
            );
       if ( ! $found )
           return false;
       $return = array();
       foreach ( $found as $f ){
           //print_r($f);
           if(strstr($f['Variable']['value'], 'a:'))
                $f['Variable']['value'] = unserialize ( $f['Variable']['value'] );

            if ( $returnKeys )
                $return[$f['Variable']['id']][$f['Variable']['key']] = $f['Variable']['value'];
            else {
                $return[$f['Variable']['key']] = $f['Variable']['value'];
            }
       }



      // print_r($return);
       return $return;

    }
    public function addVariable( $key, $value ){
        $check = $this->getVariable($key , true);
        if( $check )
            $this->id = key ( $check );
        //return true;
       return $this->save( array( 'key' => $key, 'value' => $value  ) );
    }
    public function removeVariable( $key ){
        $remove = $this->getVariable( $key, true );

        if( $remove )
            return $this->delete( (int) key( $remove ) );
        else
            return false;
    }
}
?>
