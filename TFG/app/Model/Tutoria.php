<?php
	class Tutoria extends AppModel{
		
		public $validate = array(
			'asignatura_id' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el id de la asignatura'
				)
			),
			'profesor_id' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el id del profesor'
				)
			),
			'dia' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Selecciones el día'
				)
			),'hora_inicio' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la hora. Ej:09:50'
				)
			),'hora_fin' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la hora. Ej:09:50'
				)
			),'despacho' => array(
				'required' => array(
					'rule' => 'numeric',
					'message' => 'Introduzca el numero del despacho'
				)
			),'minuto_inicio' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la hora. Ej:09:50'
				)
			),'minuto_fin' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la hora. Ej:09:50'
				)
			)
		);
		
		
		 public $belongsTo = array(
        	'Profesor' => array(
            	'className' => 'Profesor',
            	'foreignKey' => 'profesor_id'
        	),
        	'Asignatura' => array(
            	'className' => 'Asignatura',
            	'foreignKey' => 'asignatura_id'
        	)
    	);

		/*public function getTutorias(){

			$this->Tutoria('Profesor');
		}*/
	}
?>