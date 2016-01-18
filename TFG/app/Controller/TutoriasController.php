<?php
	
	class TutoriasController extends AppController {

		 public function index(){

			if($this->request->is('get')){
				$data = $this->Tutoria->find('all');
				$this->set('tutorias', $data);
			}
		}
	
		 public function add(){//comprobar que non exista unha tutoria con eses mismos datos

		 	if($this->request->is('post')){
		 		$this->loadModel('Profesor');
				$prof = $this->Profesor->find('count', array('conditions'=> array('Profesor.id =' => $this->request->data['Tutoria']['profesor_id'])));

				$this->loadModel('Asignatura');
				$asig = $this->Asignatura->find('count', array('conditions'=> array('Asignatura.id =' => $this->request->data['Tutoria']['asignatura_id'])));

				if($prof == 1 && $asig == 1){
			 		if($this->Tutoria->validates()){
			 			$data = array('asignatura_id' => $this->request->data['Tutoria']['asignatura_id'], 'profesor_id' => $this->request->data['Tutoria']['profesor_id'], 'dia' => $this->request->data['Tutoria']['dia'], 'despacho' => $this->request->data['Tutoria']['despacho'], 'hora_inicio' => $this->request->data['Tutoria']['hora_inicio']['hour'], 'hora_fin' => $this->request->data['Tutoria']['hora_fin']['hour'], 'minuto_inicio' => $this->request->data['Tutoria']['minuto_inicio']['min'], 'minuto_fin' => $this->request->data['Tutoria']['minuto_fin']['min']);
			 			
			 			$this->Tutoria->save($data);
	 					$data = $this->Tutoria->find('all');
						$this->set('tutorias', $data);
	 					$this->Flash->success('Tutoria registrada correctamente');
						print_r($this->request->data);
						return $this->redirect(array('controller' => 'Tutorias', 'action' => 'index'));
			 		}
		 		}else{
		 			$this->Flash->set($prof .' Id de profesor y/o asignatura incorrecta ' . $asig);
		 		}
		 	}
		 }
	}
?>