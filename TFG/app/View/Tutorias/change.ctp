
<script>
$(function() {
      $("#datepicker").datepicker();
});
</script>
<?php 
echo $this->Form->input('Nueva fecha de la tutoría', 
        array(
           'id'=>'datepicker',
           'type'=>'text'
        ));

?>