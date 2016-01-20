<?php
	class Profesor extends AppModel{
		
		public $validate = array(
			'usuarioP' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre de usuario'
				)
			),
			'passP' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la contraseña'
				)
			),
			'nombreP' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre'
				)
			),'apellidosP' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca los apellidos'
				)
			),'passP_2' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la contraseña'
				)
			)
		);
		public $hasMany = array(
        'Asignatura' => array(
            'className' => 'Asignatura',
        )
    );
	}
?>