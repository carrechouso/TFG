<h1 align="center"> PÁGINA INICIAL</h1>

<?php echo $this->Form->create('Alumno',  array('url' => array('controller' => 'alumnos', 'action' => 'index'))); 
      echo $this->Form->Input('usuarioAl',array('label' => '', 'placeholder' => 'Nombre de Usuario', 'type' => 'text'));
	  echo $this->Form->Input('passAl',array('label' => '', 'placeholder' => 'Contraseña', 'type' => 'password'));
	  echo $this->Form->End('Acceder--Cifrar contraseña');
	  echo $this->Html->link('Registrarse','/Alumnos/add');
?>