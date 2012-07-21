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

    /*
     * Sets the 'rate' field for a login to either 'piece' (0), or 'team' (1):
     */
    public function setRate( $userID, $rate ){
        $this->id = (int) $userID;

        $value = ($rate == 0 ? 'piece' : 'team);
        if(  $this->saveField('rate', $value) )
            return true;
        else {

            echo 'Could not set rate for user id $userID, rate $rate';
            return false;
        }


        #return $this->save( array( 'rate' => $value ) );
    }

    /*
     * Get the list of IDs related to the current study only.
     */
    public function getCurrentParticipants(){
        $this->loadModel(Study);
        $this->loadModel(Variable);

        $currentStudyID = $this->Variable->getValue("currentStudy");
        
        $params = array(
            'conditions' => array('Study.id' => $currentStudyID), //array of conditions
            'fields' => array('Study.participants'), //array of field names
        );


        $participants = array();
        $p_ary = $this->Study->find('first', $params);
        $participantArray = unserialize($p_ary["Study"]["participants"]);
        return $participantArray;

    }
}
?>
