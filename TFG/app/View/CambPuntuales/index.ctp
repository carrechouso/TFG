<h1 align = "center"> Lista de cambios puntuales </h1>

<ul>
	<?php
		$userData = $this->Session->read('userData');
		$userType = $this->Session->read('userType');
		//print_r($tutorias);
		foreach ($tutorias as $valor) {
			
			$fecha =  explode("-", $valor['c']['dia']);
			$dia = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
			
			$min_inicio = $valor['c']['minuto_inicio'];
			$min_fin = $valor['c']['minuto_fin'];
			if($min_inicio == '0')
				$min_inicio = '00';
		
			if($min_fin == '0')
				$min_fin = '00';
			
			if( $userType == 'profesor' ){
				
				if($valor['c']['profesor_id'] == $userData[0]['Profesor']['id']){
				?>
					<li> <?php echo $valor['p']['nombreP'] . ' ' .$valor['p']['apellidosP'] . ' día ' .$dia . ' tutorías de ' . $valor['a']['nombreA'] . ' son desde las '. $valor['c']['hora_inicio'] . ':' . $min_inicio. ' hasta las ' . $valor['c']['hora_fin'] . ':' . $min_fin; 
						?>
					</li>
					<?php 
				}
			}else if ($userType == 'admin'){
				
				?>
					<li> <?php echo $valor['p']['nombreP'] . ' ' .$valor['p']['apellidosP'] . ' día ' .$dia . ' tutorías de ' . $valor['a']['nombreA'] . ' son desde las '. $valor['c']['hora_inicio'] . ':' . $min_inicio. ' hasta las ' . $valor['c']['hora_fin'] . ':' . $min_fin; 
						?>
					</li>
				<?php
			}		
		}
	?>
</ul>