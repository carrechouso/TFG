<h1 align="center">Mis asignaturas</h1>
<?php
	
	$userData = $this->Session->read('userData');
	$userType = $this->Session->read('userType');
	//print_r($data);
	
	?>
	<ul><?php

	foreach($data as $row){
		if ($userType == 'admin'){
			?>
				<li><p>
					<?php
						echo 'Nombre: ' . $row['a']['nombreA'] . ' Cuatrimeste: ' . $row['a']['cuatrimestre'] . ' nº de creditos: ' . $row['a']['creditos'] . ' Profesor: ' . $row['p']['nombreP'] . ' ' . $row['p']['apellidosP'];
					?>
				</p></li>
				<?php

		}else if ($userType == 'profesor'){
			if ($row['i']['profesor_id'] == $userData[0]['Profesor']['id']){
				?>
				<li><p>
					<?php
						echo 'Nombre: ' . $row['a']['nombreA'] . ' Cuatrimeste: ' . $row['a']['cuatrimestre'] . ' nº de creditos: ' . $row['a']['creditos'];
					?>
				</p></li>
				<?php
			}
		}
		?>
			</ul>
		<?php
	}
?>
