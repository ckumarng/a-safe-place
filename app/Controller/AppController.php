<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    /**
     * for now this is the order of the study
     * @todo make this a database option to be editable on the web
     * @todo create environment/admin database table
     */
    public $activity_order = array(
        1 => 'firstStudy',
        2 => 'secondStudy'
    );
    public $password = 'simple123';
    public $StudyNumber = 1;
    #---------------------------------------------------------------------------
    # End option need for database
    public function LoginCheck(){
        if ( ! $this->Session->check('pid') )
            $this->redirect ( array( 'controller' => 'login' ) );

    }

//public $components = array('DebugKit.Toolbar');
}
