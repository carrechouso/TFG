<h1 align = 'center'> Lista de asignaturas</h1>

<?php
	$num = 1;
	foreach ($asignaturas as $row){
		echo $this->Form->create('Asignatura', array('url' => array('controller' => 'asignaturas', 'action' => 'generarCalendario')));
		?>
		<p><?php echo $this->Form->checkbox($num++, array('value' => $row['Asignatura']['id'],'hiddenField' => false));
		echo $row['Asignatura']['nombreA'];
		?></p><?php
	}
	echo $this->Form->end('descargar calendario de las asignaturas seleccionadas');

?> 