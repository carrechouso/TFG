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
		
		 	public function generarCalendario(){

		 		if($this->request->is('get')){
		 			$this->set('asignaturas', $this->Asignatura->find('all'));
		 		}
		 		if($this->request->is('post')){
					$num =  $this->Asignatura->find('count');
					$this->set('asignaturas', $this->Asignatura->find('all'));
		 			print_r($this->request->data);
		 			
		 			//generar o calendario colleando os datos das tutorias e dos profesores
		 			//mirar de ofrecer tamen os distintos profesores pondo nome do prfesor no calendario ou por separado
		 			//revisar o inicio e fin dos cuatrimestres creando tabla ou algo
		 			//pedir duración do calendario a crear
		 		}
						 	
		 	}
		}
	?>