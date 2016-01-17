
<h1 align="center"> REGISTRO Profesor</h1>
<?php echo $this->Form->create('Profesor', array('url' => array('controller' => 'Profesores', 'action' => 'add'))) ;
	 echo $this->Form->Input('nombreP',array('label' => '', 'placeholder' => 'Nombre', 'type' => 'text'));
	 echo $this->Form->Input('apellidosP',array('label' => '', 'placeholder' => 'Apellidos', 'type' => 'text'));
	 echo $this->Form->Input('usuarioP',array('label' => '', 'placeholder' => 'Nombre de Usuario', 'type' => 'text'));
	 echo $this->Form->Input('passP',array('label' => '', 'placeholder' => 'Contraseña', 'type' => 'password'));
	 echo $this->Form->Input('passP_2',array('label' => '', 'placeholder' => 'Repita la Contraseña', 'type' => 'password'));
	  echo $this->Form->Input('tipoUsuario',array('label' => '', 'placeholder' => 'Contraseña', 'type' => 'hidden', 'value' => 'profesor'));
	 echo $this->Form->End('Crear nuevo profesor');
?>