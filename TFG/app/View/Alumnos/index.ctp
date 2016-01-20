<h1 align="center"> PÁGINA INICIAL USUARIO LOGUEADO</h1>

<h3> usuario correcto</h3>

<?php 
	$userData = $this->Session->read('userData');
	$userType = $this->Session->read('userType');
	echo 'tipoUsuario:' . $userType;
	?>
	</br></br>
	<?php
	if( $userType == 'admin'){
		
		echo $this->Html->link("Dar de alta a profesor",array('controller' => 'Profesores', 'action' => 'add'));
		?></br>

		<?php
		echo $this->Html->link("Dar de alta asignatura",array('controller' => 'Asignaturas', 'action' => 'add'));
		?></br>
		<?php
		echo $this->Html->link("Lista de tutorias",array('controller' => 'Tutorias', 'action' => 'index'));
		?></br>
		<!--<?php
		//echo $this->Html->link("Resgistrarse en asignatura",array('controller' => 'imparten', 'action' => 'add'));
		?></br>-->
		<?php
			echo $this->Html->link("Asignaturas  y profesores",array('controller' => 'imparten', 'action' => 'index'));
	
	}
?>

