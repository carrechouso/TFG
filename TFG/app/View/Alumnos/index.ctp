<h1 align="center"> PÁGINA INICIAL USUARIO LOGUEADO</h1>

<h3> usuario correcto</h3>

<?php 
	$userData = $this->Session->read('userData');
	//echo 'tipoUsuario:' . $userData[0]['Alumno']['tipoUsuario'] . ' ' . $Session->read ( 'Auth.User.username' );

	if( $userData[0]['Alumno']['tipoUsuario'] == 'admin'){
		
		echo $this->Html->link("Dar de alta a profesor",array('controller' => 'Profesores', 'action' => 'add'));
		?></br>

		<?php
		echo $this->Html->link("Dar de alta asignatura",array('controller' => 'Asignaturas', 'action' => 'add'));		
	}
?>