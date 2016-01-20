<?php
	class CambPuntual extends AppModel{
		
		public $validate = array(
			
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
		
		public function getData(){
			$this->CambPuntual->query("select * from tutotias t, profesores p, asignaturas a where p.id = t.profesor_id and a.id = t.tutoria_id");
		}

		 public $belongsTo = array(
        	'Tutoria' => array(
            	'className' => 'Tutoria',
            	'foreignKey' => 'tutoria_id'
        	),
        	'Profesor' => array(
            	'className' => 'Profesor',
            	'foreignKey' => 'profesor_id'
            )
    	);

	}
?>