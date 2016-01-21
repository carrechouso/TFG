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
		
		
		 function getDatos(){
			return $this->query("SELECT * FROM asignaturas a, profesores p, imparten i WHERE a.id = i.asignatura_id AND  p.id = i.profesor_id");
		}
	}
?>