<?php
	
	class MensajesController extends AppController {

		 public function index(){
		 	if($this->request->is('get')){
		 		$userData = $this->Session->read('userData');
		 		$userType = $this->Session->read('userType');
		 		
		 		if($userType == 'profesor'){
		 			$this->set('mensajes', $this->Mensaje->getMensajes ($userData[0]['Profesor']['id']));
		 			$this->set('userId', $userData[0]['Profesor']['id']);
		 		}else if($userType == 'admin' || $userType == 'alumno'){
		 			$this->set('mensajes', $this->Mensaje->getMensajes ($userData[0]['Alumno']['id']));
		 			$this->set('userId', $userData[0]['Alumno']['id']);
		 		}
		 		$this->set('userType', $userType);

		 	}
		
		}
	
		 public function add(){
		 	
		 	if($this->request->is('get')){
		 		$this->set('nombre', $this->request->query['nombre']);
		 		$this->set('apellidos', $this->request->query['apellidos']);
		 		$this->set('receptor_id', $this->request->query['receptor_id']);
		 		$this->set('emisor_id', $this->request->query['emisor_id']);
		 	}
		 	if($this->request->is('post')){
		 		$this->Mensaje->save($this->request->data);
		 		$this->Flash->success('mensaje enviado');
		 		$this->redirect(array('controller' => 'mensajes', 'action' => 'index'));
		 	}
		 }
	}
?>