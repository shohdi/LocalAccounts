<?php
	
	class Account extends AppModel
	{
		public $validate = array (
			'site'=>array(
				'rule'=>'notEmpty',
			),
			'user'=>array(
				'rule'=>'notEmpty',
			),
			'password'=>array(
				'rule'=>'notEmpty',
			),
		);
	}
	




?>
