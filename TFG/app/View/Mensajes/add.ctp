<h1 align ="center">Enviar mensaje a <?php echo $nombre . ' ' . $apellidos ;?></h1>

<h1> no controlador falta mirar que se non esta validao o niu non se lle permita enviar o mensaxe e tamen falta a opcion de responder</h1>
 <?php
	echo $this->Form->create('Mensaje', array('url' => array('controller' => 'mensajes', 'action' => 'add')));
	echo $this->Form->input('mensaje', array('type' => 'textarea', 'escape' => false));
	echo $this->Form->input('emisor_id', array('type' => 'hidden', 'value' => $emisor_id));
	echo $this->Form->input('receptor_id', array('type' => 'hidden', 'value' => $receptor_id));	
	echo $this->Form->End('Enviar mensaje');
?>