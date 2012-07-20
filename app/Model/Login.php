<?php

class Login extends AppModel {

     var $validate = array(
        // name field
        'ID' => array(
            'rule'         => 'VALID_NOT_EMPTY',
            'required' => true,
            'message'     => 'Please enter ID'
        ),
         'password' => array(
            // must not be empty
            'rule'         => 'VALID_NOT_EMPTY',
             'required' => true,
            // error message to display
            'message'     => 'Please enter Password'
        )
         );
    public function getUserID( $userID ){
        return $this->find('first',array(
                            'conditions' =>  array(
                                'Login.id' => (int) $userID
                            ),
                            'fields' => array(
                                'Login.id',
                            )
                        )
                    );
    }
    public function setComplete( $userID ){
        $this->id = (int) $userID;

        if(  $this->saveField('complete', 1) )
            return true;
        else {

            echo 'something went wrong';
            return false;
        }


        return $this->save( array( 'complete' => 1 ) );
    }
    public function isComplete( $userID ){
        $complete = $this->find('first',array(
                    'conditions' =>  array(
                        'Login.id' => (int) $userID
                    ),
                    'fields' => array(
                        'Login.complete',
                    )
                )
            );
        if ( $complete ){
            if ( $complete == 1 )
                return true;
        }

        return false;
    }
}
?>
