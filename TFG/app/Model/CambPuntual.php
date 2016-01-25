<?php
	class CambPuntual extends AppModel{
		
		public $validate = array(
			
			'dia' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Selecciones el día'
				)
			),'diaCambio' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Selecciones el día'
				)
			),
			'hora_inicio' => array(
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
			return $this->query("SELECT a.nombreA, c.diaCambio, c.despacho, c.dia, c.profesor_id, c.hora_inicio, c.hora_fin, c.minuto_inicio, c.minuto_fin, p.nombreP, p.apellidosP FROM camb_puntuales c, tutorias t, profesores p, asignaturas a WHERE  c.tutoria_id = t.id and p.id = c.profesor_id and t.profesor_id = p.id and t.asignatura_id = a.id");
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