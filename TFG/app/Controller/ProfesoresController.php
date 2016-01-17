<?php
	
	class ProfesoresController extends AppController {

		public function add(){
		 	
		 	if($this->request->is('post')){
		 		$num = $this->Profesor->find('count',  array('conditions' => array('Profesor.usuarioP =' => $this->request->data['Profesor']['usuarioP'])));
		 		
		 		if($num == 1){
		 			$this->Flash->set('Ese nombre de usuario ya existe');
		 		}else{
		 			if($this->request->data['Profesor']['passP'] != $this->request->data['Profesor']['passP_2']){
		 			  $this->Flash->set('las contraseñas no son iguales');
		 			}else{
		 				$this->Profesor->save($this->request->data);
					    $this->Flash->success('Profesor registrado correctamente');
						return $this->redirect(array('controller' => 'Alumnos', 'action' => 'index'));		
		 			}
		 		}
		 	}
		}

		public function index() {

		}

	}

?>