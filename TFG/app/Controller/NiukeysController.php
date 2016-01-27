<?php
	
	class NiukeysController extends AppController {

		public function index(){

			if($this->request->is('get')){
				$this->set('validateUsers', $this->Niukey->getValidateUsers());
				$this->set('NonvalidateUsers', $this->Niukey->getNonValidateUsers());
			}
		}

		 public function delete(){
		 	if($this->request->is('post')){
		 		$this->Niukey->deleteAll( array('Niukey.niu =' => $this->request->data['Niukey']['niu']),false);
		 		$this->Flash->success(('NIU ' . $this->request->data['Niukey']['niu']) . ' deshabilitado');
		 		return $this->redirect(array('controller' => 'Niukeys', 'action' => 'index'));
		 	}
		}

		 public function add(){
		 	if($this->request->is ('post')){
		 		$this->Niukey->save ($this->request->data);
		 		$this->Flash->success (('NIU ' . $this->request->data['Niukey']['niu']) . ' habilitado');
		 		return $this->redirect (array('controller' => 'Niukeys', 'action' => 'index'));
		 	}
		}
	}

?>