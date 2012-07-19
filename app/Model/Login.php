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

}
?>
