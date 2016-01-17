<h1 align="center"> REGISTRO ASIGNATURA</h1>
<?php echo $this->Form->create('Asignatura', array('url' => array('controller' => 'asignaturas', 'action' => 'add'))) ;
	 echo $this->Form->Input('nombreA',array('label' => '', 'placeholder' => 'Nombre de la asignatura', 'type' => 'text'));
	 echo $this->Form->Input('creditos',array('label' => '', 'placeholder' => 'Número de creditos', 'type' => 'text'));
	 echo $this->Form->Input('cuatrimestre',array('label' => '', 'placeholder' => 'Cuatrimeste (1-2)', 'type' => 'text'));
	 echo $this->Form->Input('codigoAsignatura',array('label' => '', 'placeholder' => 'código asignado a la asignatura', 'type' => 'text'));
	  echo $this->Form->End('Crear nueva asignatura');
?>