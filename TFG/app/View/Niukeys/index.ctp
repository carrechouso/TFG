<h1 align="center"> Lista de usuarios con NIU</h1>



<?php 
?><h1> alumnos  validados</h1><?php

	foreach($validateUsers as $row){
		print_r($row);
		//echo $row['Niukey']['niu'];
	
	}
	?><h1> alumnos no validados</h1><?php
	foreach($NonvalidateUsers as $row){
		print_r($row);
		//echo $row['Niukey']['niu'];
	
	}
?>