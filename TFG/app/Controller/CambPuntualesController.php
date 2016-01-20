<?php
	
	class CambPuntualesController extends AppController {

		 public function index(){

			if($this->request->is('get')){
				$data = $this->CambPuntual->find('all');
				//$data = $this->CambPuntual->getData();
				$this->set('tutorias', $data);
			}
		}
	
		 public function add(){//comprobar que non exista unha tutoria con eses mismos datos

		 	if($this->request->is('post')){
		 		print_r($this->request->data);	
		 		$fecha = explode("/",$this->request->data['CambPuntual']['dia']);
				$dia = $fecha[2] . '/' . $fecha[0] . '/' . $fecha[1];
				$num = $this->CambPuntual->find('count', array('conditions' => array( 
					'CambPuntual.tutoria_id =' => $this->request->data['CambPuntual']['tutoria_id'],
					'CambPuntual.hora_inicio =' => $this->request->data['CambPuntual']['hora_inicio']['hour'],
					'CambPuntual.profesor_id =' => $this->request->data['CambPuntual']['profesor_id'],
					'CambPuntual.dia =' => $dia,
					'CambPuntual.despacho =' => $this->request->data['CambPuntual']['despacho'],
					'CambPuntual.hora_fin =' => $this->request->data['CambPuntual']['hora_fin']['hour'],
					'CambPuntual.minuto_inicio =' => $this->request->data['CambPuntual']['minuto_inicio']['min'],
					'CambPuntual.minuto_fin =' => $this->request->data['CambPuntual']['minuto_fin']['min'])));
				
				if($num == 0){
			 		if($this->CambPuntual->validates()){
						$save = array('tutoria_id' => $this->request->data['CambPuntual']['tutoria_id'], 
							'profesor_id' => $this->request->data['CambPuntual']['profesor_id'], 
							'dia' => $dia, 
							'despacho' => $this->request->data['CambPuntual']['despacho'], 
							'hora_inicio' => $this->request->data['CambPuntual']['hora_inicio']['hour'], 
							'hora_fin' => $this->request->data['CambPuntual']['hora_fin']['hour'], 
							'minuto_inicio' => $this->request->data['CambPuntual']['minuto_inicio']['min'],
						    'minuto_fin' => $this->request->data['CambPuntual']['minuto_fin']['min']);
						$this->CambPuntual->save($save);
	 					$data = $this->CambPuntual->find('all');
						$this->set('tutorias', $data);
	 					$this->Flash->success('Cambio puntual registrado correctamente');
						return $this->redirect(array('controller' => 'CambPuntuales', 'action' => 'index'));
			 		}else{
			 			$this->Flash->set('datos incorrectos');
			 			return $this->redirect(array('controller' => 'Tutorias', 'action' => 'change'));	
			 		}
		 		}else{
		 			$this->Flash->set('Ya se ha registrado un cambio de tutoría con los mismos datos que los indicados');
		 			return $this->redirect(array('controller' => 'CambPuntuales', 'action' => 'index'));
		 		}
		 	}
		 }
	}
?>