<?php
	
	class AlumnosController extends AppController {

		public function index(){

			if($this->request->is('post')){

				$num = $this->Alumno->find('count', array('conditions'=> array('Alumno.usuarioAl =' => $this->request->data['Alumno']['usuarioAl'], 'Alumno.passAl' => $this->request->data['Alumno'] ['passAl'])));
				
				if($num == 1){
					$userData = $this->Alumno->find('all', array('conditions'=> array('Alumno.usuarioAl =' => $this->request->data['Alumno']['usuarioAl'])));
				    $this->Session->write('userType', $userData[0]['Alumno']['tipoUsuario']);
					$this->Session->write('userData', $userData);
					print_r($userData);
				}else{
					$this->loadModel('Profesor');
					$num = $this->Profesor->find('count', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Alumno']['usuarioAl'], 'Profesor.passP' => $this->request->data['Alumno'] ['passAl'])));
					
					if($num == 1){
						echo 'entra';
						$userData = $this->Profesor->find('all', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Alumno']['usuarioAl'])));
				    	$this->Session->write('userData', $userData);
					    $this->Session->write('userType', $userData[0]['Profesor']['tipoUsuario']);
						return $this->redirect(array('controller' => 'profesores', 'action' => 'index'));
					}else{
						$this->Flash->set('usuario o contraseña incorrecta');
						return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
					}
				}
			}
		}

		 public function add(){

		 	if($this->request->is('post')){
		 		$num = $this->Alumno->find('count', array('conditions' => array('Alumno.usuarioAl =' => $this->request->data['Alumno']['usuarioAl'])));
		 		
		 		if($num == 1){
		 			$this->Flash->set('Ese nombre de usuario ya existe');
		 		}else{
		 			if($this->request->data['Alumno']['passAl'] != $this->request->data['Alumno']['passAl_2']){
		 			  $this->Flash->set('las contraseñas no son iguales');
		 			}else{
		 				$this->Alumno->save($this->request->data);
					    $this->Flash->success('Alumno registrado correctamente');
						return $this->redirect(array('controller' => 'pages', 'action' => 'home'));		
		 			}
		 		}
		 	}
		}
		

		public function logout(){
			$this->Session->destroy();
			return $this->redirect(array('controller' => 'pages', 'action' => 'home'));	
		}
	}

?>