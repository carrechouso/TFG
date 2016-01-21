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
		 		
		 		$userType = $this->Session->read('userType');
				$this->loadModel('Profesor');
				$id_profesor = $this->request->data['Tutoria']['profesor_id'];

				if($userType == 'admin'){
					$prof = $this->Profesor->find('count', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Tutoria']['profesor_id'])));					
						if($prof != 0){
					
							$id_P = $this->Profesor->find('all', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Tutoria']['profesor_id'])));		
							$id_profesor = $id_P[0]['Profesor']['id']; 
						}
				}else{
					$prof = $this->Profesor->find('count', array('conditions'=> array('Profesor.id =' => $this->request->data['Tutoria']['profesor_id'])));
				}
				
				$this->loadModel('Asignatura');
				$asig = $this->Asignatura->find('count', array('conditions'=> array('Asignatura.codigoAsignatura =' => $this->request->data['Tutoria']['asignatura_id'])));

				if($prof == 1 && $asig == 1){
			 		if($this->Tutoria->validates()){
			 			$id_A = $this->Asignatura->find('all', array('conditions'=> array('Asignatura.codigoAsignatura =' => $this->request->data['Tutoria']['asignatura_id'])));
			 			$save = array('asignatura_id' => $id_A[0]['Asignatura']['id'], 'profesor_id' => $id_profesor, 'dia' => $this->request->data['Tutoria']['dia'], 'despacho' => $this->request->data['Tutoria']['despacho'], 'hora_inicio' => $this->request->data['Tutoria']['hora_inicio']['hour'], 'hora_fin' => $this->request->data['Tutoria']['hora_fin']['hour'], 'minuto_inicio' => $this->request->data['Tutoria']['minuto_inicio']['min'], 'minuto_fin' => $this->request->data['Tutoria']['minuto_fin']['min']);
			 			//print_r($id_A);
			 			$this->Tutoria->save($save);
	 					$data = $this->Tutoria->find('all');
						$this->set('tutorias', $data);
	 					$this->Flash->success('Tutoria registrada correctamente');
						return $this->redirect(array('controller' => 'Tutorias', 'action' => 'index'));
			 		}
		 		}else{
		 			$this->Flash->set($prof .' Id de profesor y/o asignatura incorrecta ' . $asig);
		 		}
		 	}
		 }

		 public function change(){
		 	if($this->request->is('post')){
		 		print_r($this->request->data);
		 		$this->set('id_tutoria',$this->request->data['Tutoria']['tutoria']);
		 		$this->set('id_profesor',$this->request->data['Tutoria']['profesor']);
		 	}
		 }
	}
?>