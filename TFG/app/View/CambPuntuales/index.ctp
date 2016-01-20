<h1 align = "center"> Lista de cambios puntuales </h1>

<ul>
	<?php
		$userData = $this->Session->read('userData');
		$userType = $this->Session->read('userType');
		print_r($tutorias);
		foreach ($tutorias as $valor) {
			$fecha =  explode("-", $valor['CambPuntual']['dia']);
			$dia = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
			
			$min_inicio = $valor['CambPuntual']['minuto_inicio'];
			$min_fin = $valor['CambPuntual']['minuto_fin'];
			if($min_inicio == '0')
				$min_inicio = '00';
		
			if($min_fin == '0')
				$min_fin = '00';
			
			if( $userType == 'profesor' ){
				
				if($valor['CambPuntual']['profesor_id'] == $userData[0]['Profesor']['id']){
				?>
					<li> <?php echo $valor['Profesor']['nombreP'] . ' ' .$valor['Profesor']['apellidosP'] . ' día ' .$dia . ' tutorías de ' . $valor['Profesor']['Asignatura']['nombreA'].' asa' . ' son desde las '. $valor['CambPuntual']['hora_inicio'] . ':' . $min_inicio. ' hasta las ' . $valor['CambPuntual']['hora_fin'] . ':' . $min_fin; 
						?>
					</li>
					<?php 
				}
			}else if ($userType == 'admin'){
				
				?>
					<li> <?php echo $valor['Profesor']['nombreP'] . ' ' .$valor['Profesor']['apellidosP'] . ' día ' .$dia . ' tutorías de ' . $valor['Profesor']['Asignatura']['nombreA'] .'asa' . ' son desde las '. $valor['CambPuntual']['hora_inicio'] . ':' . $min_inicio. ' hasta las ' . $valor['CambPuntual']['hora_fin'] . ':' . $min_fin; 
						?>
					</li>
				<?php
			}		
		}
	?>
</ul>