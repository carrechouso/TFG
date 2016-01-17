<?php
	class Asignatura extends AppModel{
		
		public $validate = array(
			'nombreA' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre de la asignatura'
				)
			),
			'cuatrimestre' => array(
				'required' => array(
					'rule' => '(1|2)',
					'message' => 'selecione 1 o 2'
				)
			),
			'creditos' => array(
				'required' => array(
					'rule' => 'numeric',
					'message' => 'Introduzca el número de creditos'
				)
			),'codigoAsignatura' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca un código de asignatura'
				)
			)
		);
	}
?>