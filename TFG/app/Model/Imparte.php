<?php
	class Imparte extends AppModel{
		
			public $validate = array(
			'asignatura_id' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca el nombre de usuario'
				)
			),'profesor_id' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Introduzca la contraseña'
				)
			)
		);
		
		public $hasAndBelongsToMany = array(
        	'Profesor' => array(
            	'className' => 'Profesor',
            	'foreignKey' => 'profesor_id'
        	),
        	'Asignatura' => array(
            	'className' => 'Asignatura',
            	'foreignKey' => 'asignatura_id'
        	)
    	);
		 function getDatos(){
			return $this->query("SELECT * FROM asignaturas a, profesores p, imparten i WHERE a.id = i.asignatura_id AND  p.id = i.profesor_id");
		}
	}
?>