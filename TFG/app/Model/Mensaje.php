<?php
	class Mensaje extends AppModel{
		
		public $validate = array(
			
			'message' => array(
				'required' => array(
					'rule' => array('notBlank'),
					'message' => 'Escribe el mensaje'
				)
			)
		);

		public function getMensajes($id){

			return $this->query("SELECT m.fecha_mensaje, m.receptor_id, m.mensaje, m.emisor_id, p.nombreP, p.apellidosP, a.nombreAl, a.apellidosAl 
								 FROM mensajes m, alumnos a, profesores p 
								 WHERE (a.id = '".$id."' and (m.emisor_id =a.id or m.receptor_id = a.id) and (m.emisor_id =p.id or m.receptor_id = p.id)) 
								 	or (p.id = '".$id."' and (m.emisor_id =p.id or m.receptor_id = p.id) and (m.emisor_id =a.id or m.receptor_id = a.id)) ORDER BY 1 DESC");
		}
	}
?>