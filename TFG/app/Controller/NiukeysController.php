<?php
	
	class NiukeysController extends AppController {

		public function index(){

			if($this->request->is('get')){
				$this->set('validateUsers', $this->Niukey->getValidateUsers());
				$this->set('NonvalidateUsers', $this->Niukey->getNonValidateUsers());
			}
		}

		 public function add(){
		 	
		}
	}

?>