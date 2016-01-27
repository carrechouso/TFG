<?php
	class Niukey extends AppModel{

	public function getValidateUsers(){
		return $this->query("select a.nombreAl, a.apellidosAl, a.niu from niukeys n, alumnos a where a.niu = n.niu");
	}

	public function getNonValidateUsers(){
		return $this->query("SELECT a.niu, a.nombreAl, a.apellidosAl FROM alumnos AS a LEFT OUTER JOIN niukeys AS n ON a.niu = n.niu WHERE n.niu IS NULL");
	}
}
?>