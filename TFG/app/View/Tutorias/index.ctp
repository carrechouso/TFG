<h1 align="center">Lista de tutorias</h1>

<ul>
	<?php
	foreach ($tutorias as $valor) {?>
		<li> <?php echo $valor['Tutoria']['asignatura_id']; ?></li>
	<?php }
	?>
</ul>
</br>
</br>
</br>
</br>

<?php
		echo $this->Html->link("Dar de alta tutoría",array('controller' => 'Tutorias', 'action' => 'add'));
		?></br>
