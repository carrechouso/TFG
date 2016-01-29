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
		?>
		</br>
		<?php
			echo $this->Html->link("Lista de cambios puntuales mis tutorías",array('controller' => 'cambPuntuales', 'action' => 'index'));
			?>
		</br>
		<?php
			echo $this->Html->link("lista de profesores", array('controller' => 'profesores', 'action' => 'datosTodosProfesores'));
			?>
		</br>
		<?php
			echo $this->Html->link("Gestionar NIU de alumnos", array('controller' => 'niukeys', 'action' => 'index'));

	?>
	<?php
	}

		?>
		</br>
		<?php
		echo $this->Html->link("Profesores y tutorias", array('controller' => 'Profesores', 'action' => 'listarProfesores'));
		?>
		</br>
		<?php
			echo $this->Html->link("Lista de asignaturas",array('controller' => 'asignaturas', 'action' => 'index'));
		?>
		</br>
		<?php
			echo $this->Html->link("Descargar calendario de tutorías",array('controller' => 'tutorias', 'action' => 'generarCalendario'));
		?>
		</br>
		<?php
			echo $this->Html->link("Lista de Mensajes",array('controller' => 'mensajes', 'action' => 'index'));
?>

