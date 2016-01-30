<h1 align ="center">Enviar mensaje a <?php echo $nombre . ' ' . $apellidos ;?></h1>

<h1> falta por facer borrar mensaje e paginación. mirar o htmlpost link exemplo o final desta clase</h1>

 <?php
	echo $this->Form->create('Mensaje', array('url' => array('controller' => 'mensajes', 'action' => 'add')));
	echo $this->Form->input('mensaje', array('type' => 'textarea', 'escape' => false));
	echo $this->Form->input('emisor_id', array('type' => 'hidden', 'value' => $emisor_id));
	echo $this->Form->input('receptor_id', array('type' => 'hidden', 'value' => $receptor_id));	
	echo $this->Form->End('Enviar mensaje');
?>

<!--<?php //echo $this->Form->postLink(
 //   'Delete',
   // array('action' => 'delete', $country['Country']['id']),
    //array('confirm' => __('Are you sure you want to delete ').$country['Country']['name'].'?')
//)?>
-->