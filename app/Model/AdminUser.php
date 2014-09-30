<?php

    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// app/Model/AdminUser
App::uses('AppModel', 'Model');
class AdminUser extends AppModel
{
    public $validate = array(
        'username' => array(
            'required'=> array(
                'rule'=> array('notEmpty'),
                'message' => 'Please enter your email address!'
            ),
            'valid' => array(
                'rule'=> 'email',
                'message'=>'you must enter a valid email address!'
            ),
        ),
    );
}
