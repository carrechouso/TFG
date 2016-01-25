<h1 align = 'center'> Lista de asignaturas</h1>

<script>
	$(function() {
      $("#datepicker").datepicker();
	});

	$(function() {
      $("#datepicker2").datepicker();
	});
</script>

<?php 
	$num = 1;
	foreach ($asignaturas as $row){
		echo $this->Form->create('Asignatura', array('url' => array('controller' => 'tutorias', 'action' => 'generarCalendario')));
		?>
		<p><?php echo $this->Form->checkbox($num++, array('value' => $row['Asignatura']['id'],'hiddenField' => false));
		echo $row['Asignatura']['nombreA'];
		?></p><?php
	}
    echo $this->Form->input('numeroFilas', array('value' => $num,'type' => 'hidden'));
	echo $this->Form->input('fechaInicio', array('id'=>'datepicker','type'=>'text', 'label' => 'Fecha de inicio del calendario'));
	echo $this->Form->input('fechaFin', array('id'=>'datepicker2','type'=>'text', 'label' => 'Fecha de fin del calendario'));
	
	echo $this->Form->end('descargar calendario de las asignaturas seleccionadas');

?> 