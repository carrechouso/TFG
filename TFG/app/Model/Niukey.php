<?php
	class Niukey extends AppModel{

	public function getValidateUsers(){
		return $this->query("select a.nombreAl, a.apellidosAl, a.niu from niukeys n, alumnos a where a.niu = n.niu");
	}

	public function getNonValidateUsers(){
		return $this->query("select a.nombreAl, a.apellidosAl, a.niu from niukeys n, alumnos a where a.niu != (select niu from niukeys )");
	}
}
?>