<?php
	
	class ImpartenController extends AppController {

		public function index(){

			if($this->request->is('get')){
				//$data = $this->Imparte->query("SELECT * FROM asignaturas a, profesores p, imparten i WHERE a.id = i.asignatura_id AND  p.id = i.profesor_id");
				//$this->set('data', $data);
				$this->set('data', $this->Imparte->getDatos());
				//$log = $this->Imparte->getDataSource()->getLog(false, false);
				//	debug($log);
			}
		}

		 public function add(){
		 	if($this->request->is('get')){
		 		$this->loadModel('Asignatura');
		 		$data = $this->Asignatura->find('all');
		 		$this->set('data', $data);
		 }
		 	
		 	if($this->request->is('post')){
		 		$this->loadModel('Asignatura');
		 		$data = $this->Asignatura->find('all');
		 		$this->set('data', $data);
		 		echo 'hola';

		 		print_r($this->request->data);
		 		$this->loadModel('Imparte');
		 		$num = $this->Imparte->find('count', array('conditions' => array('Imparte.profesor_id =' => $this->request->data['Imparte']['profesor_id'], 'Imparte.asignatura_id =' => $this->request->data['Imparte']['asignatura_id'])));
		 		
		 		if($num == 1){
		 			$this->Flash->set('Ya estas dado de alta en esa asignatura');
		 		}else{
		 			$this->Imparte->save($this->request->data);
					$this->Flash->success('Dado de alta correctamente en la asignatura');
					$log = $this->Imparte->getDataSource()->getLog(false, false);
					debug($log);
					return $this->redirect(array('controller' => 'Imparten', 'action' => 'index'));		
		 			
		 		}
		 	}
		}
	}

?>