<?php
	
	class AsignaturasController extends AppController {

		public function index(){
			if($this->request->is('get')){
				$this->set('asignaturas', $this->Asignatura->find('all'));
			}
		}

		 public function add(){

		 	if($this->request->is('post')){
		 		$num = $this->Asignatura->find('count', array('conditions' => array('Asignatura.codigoAsignatura =' => $this->request->data['Asignatura']['codigoAsignatura'])));
		 		
		 		if($num == 1){
		 			$this->Flash->set('Ya existe una asignatura con el código indicado');
		 		}else{
		 			$this->Asignatura->set($this->request->data);
		 			if($this->Asignatura->validates()){
			 			$this->Asignatura->save($this->request->data);
						 $this->Flash->success('Asignatura registrada correctamente');
						return $this->redirect(array('controller' => 'Alumnos', 'action' => 'index'));		
			 			}
			 		}
		 		}
		 	}
		}
	?>