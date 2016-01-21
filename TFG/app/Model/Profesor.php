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
		

		function getDatosProfesor ($id){
			return $this->query("SELECT t.despacho, p.nombreP, p.apellidosP, a.nombreA, t.dia, t.hora_inicio, t.minuto_inicio, t.hora_fin,t.minuto_fin FROM tutorias t, profesores p, asignaturas a WHERE p.id = t.profesor_id AND t.asignatura_id=a.id AND p.id='".$id."'");
		}	
	}
?>