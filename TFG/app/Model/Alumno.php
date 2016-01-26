<?php
	class Alumno extends AppModel{

		public $validate = array(
			'usuarioAl' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre de usuario'
				)
			),
			'passAl' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la contraseña'
				)
			),
			'nombreAl' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre'
				)
			),'apellidosAl' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca los apellidos'
				)
			),'passAl_2' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la contraseña'
				)
			),'niu' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'El NIU debe contener 12 dígitos'
				)
			)
		);
	}
?>