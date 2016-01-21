
<script>
$(function() {
      $("#datepicker").datepicker();
});
</script>
<?php 


	
	echo $this->Form->create('CambPuntual', array('url' => array('controller' => 'camb_Puntuales', 'action' => 'add')));
	echo $this->Form->input('dia', array('id'=>'datepicker','type'=>'text', 'label' => 'Nueva fecha de la tutoría'));
	echo $this->Form->input('tutoria_id', array('type' => 'hidden', 'value' => $id_tutoria));
	echo $this->Form->input('profesor_id', array('type' => 'hidden', 'value' => $id_profesor));
	echo $this->Form->hour('hora_inicio', 'true',  array('default' => '10'));
	echo $this->Form->minute('minuto_inicio', array('interval' => 10, 'default' => '00'));
	?>
	</br>
	<?php
	echo $this->Form->hour('hora_fin','true', array('default' => '12'));
	echo $this->Form->minute('minuto_fin', array('interval' => 10,'default' => '00'));
	echo $this->Form->Input('despacho',array('label' => '', 'placeholder' => 'número del despacho', 'type' => 'text'));
 	echo $this->Form->End('Confirmar cambio puntual tutoría');
?>
