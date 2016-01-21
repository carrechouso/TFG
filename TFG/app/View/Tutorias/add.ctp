<h1 align="center"> REGISTRO Tutoría</h1>
<?php 
	$days = array('lunes' => 'lunes', 'martes' => 'martes', 'miercoles' => 'miercoles','jueves' => 'jueves', 'viernes' => 'viernes');
	$userType = $this->Session->read('userType');
	$userData= $this->Session->read('userData');
	print_r($userData);
	echo $this->Form->create('Tutoria', array('url' => array('controller' => 'tutorias', 'action' => 'add'))) ;
	echo $this->Form->Input('asignatura_id',array('label' => '', 'placeholder' => 'código de la asignatura', 'type' => 'text'));
	if($userType == 'admin'){
		echo $this->Form->Input('profesor_id',array('label' => '', 'placeholder' => 'nombre usuario del profesor', 'type' => 'text'));
	}else{
		echo $this->Form->Input('profesor_id',array('type' =>'hidden','value' => $userData[0]['Profesor']['id']));
	}
	echo $this->Form->input('dia', array('label' => '','options' => $days, 'default' => 'l'));
	echo $this->Form->hour('hora_inicio', 'true',  array('default' => '10'));
	echo $this->Form->minute('minuto_inicio', array('interval' => 10, 'default' => '00'));
	?>
	</br>
	<?php
	echo $this->Form->hour('hora_fin','true', array('default' => '12'));
	echo $this->Form->minute('minuto_fin', array('interval' => 10,'default' => '00'));
	echo $this->Form->Input('despacho',array('label' => '', 'placeholder' => 'número del despacho', 'type' => 'text'));
 	echo $this->Form->End('Crear nueva tutoría');
?>