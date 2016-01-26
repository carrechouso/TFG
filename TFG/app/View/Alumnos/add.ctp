<h1 align="center"> REGISTRO USAURIO</h1>
<?php echo $this->Form->create('Alumno', array('url' => array('controller' => 'alumnos', 'action' => 'add'))) ;
	 echo $this->Form->Input('nombreAl',array('label' => '', 'placeholder' => 'Nombre', 'type' => 'text'));
	 echo $this->Form->Input('apellidosAl',array('label' => '', 'placeholder' => 'Apellidos', 'type' => 'text'));
	 echo $this->Form->Input('usuarioAl',array('label' => '', 'placeholder' => 'Nombre de Usuario', 'type' => 'text'));
	 echo $this->Form->Input('passAl',array('label' => '', 'placeholder' => 'Contraseña', 'type' => 'password'));
	 echo $this->Form->Input('passAl_2',array('label' => '', 'placeholder' => 'Repita la Contraseña', 'type' => 'password'));
	 echo $this->Form->Input('tipoUsuario',array('label' => '', 'placeholder' => 'Contraseña', 'type' => 'hidden', 'value' => 'alumno'));
	 echo $this->Form->Input('niu',array('label' => '', 'placeholder' => 'Niu', 'type' => 'text'));
	 echo $this->Form->End('Crear nuevo usuario');
?>