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
		 		$this->loadModel('Niukey');
		 		$userData = $this->Session->read('userData');
		 		$userType = $this->Session->read('userType');
		 		if($userType == 'alumno'){
		 			echo 'alumno';
		 			$num = $this->Niukey->find('count', array('conditions' => array('Niukey.niu = ' => $userData[0]['Alumno']['niu'])));
		 			if($num == 1){
		 				$this->Mensaje->save($this->request->data);
		 				$this->Flash->success('mensaje enviado');
		 			}else{
		 				$this->Flash->set('Tu NIU aún no ha sido validado. No podrás mandar mensajes hasta que haya sido validado');
		 			}
		 		}else{
		 			$this->Mensaje->save($this->request->data);
		 			$this->Flash->success('mensaje enviado');
		 		}
		 		
		 		$this->redirect(array('controller' => 'mensajes', 'action' => 'index'));
		 	}
		 }
	}
?>