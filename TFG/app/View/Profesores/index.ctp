<h1 align="center"><u> index profesores<u></h1>
	<?php
		echo $this->Html->link("Mis tutorias",array('controller' => 'Tutorias', 'action' => 'index'));
	?>
		</br>
		<?php
			echo $this->Html->link("Resgistrarse en asignatura",array('controller' => 'imparten', 'action' => 'add'));
	?>
	</br>
		<?php
			echo $this->Html->link("Mis asignaturas",array('controller' => 'imparten', 'action' => 'index'));
	?>
	</br>
		<?php
			echo $this->Html->link("Lista de cambios puntuales mis tutorías",array('controller' => 'cambPuntuales', 'action' => 'index'));
		?>
		</br>
		<?php
			echo $this->Html->link("Lista de asignaturas",array('controller' => 'asignaturas', 'action' => 'index'));
		?>
		</br>
		<?php
			echo $this->Html->link("Lista de Mensajes",array('controller' => 'mensajes', 'action' => 'index'));
	?>