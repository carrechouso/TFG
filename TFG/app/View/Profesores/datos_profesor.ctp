<h1 align = "center">Datos de <?php echo $nombreP . ' ' . $apellidosP;?></h1>
<ul>
	<?php
		foreach ($data as $profesor){
			$min_ini =  $profesor['t']['minuto_inicio'];
			$min_fin =  $profesor['t']['minuto_fin'];
			
			if($min_ini == 0){
				$min_ini = '00';
			}

			if($min_fin == 0){
				$min_fin = '00';
			}

			?>
				<li> 
					<?php 

						echo 'Asignatura: ' . $profesor['a']['nombreA'];
					?>
						</br>
					<?php
						echo 'Despacho: ' . $profesor['t']['despacho'];
					?>
						</br>
					<?php
						echo 'Hora inicio: ' . $profesor['t']['hora_inicio'] .':' . $min_ini;
					?>
						</br>
					<?php
						echo 'Hora fin: ' . $profesor['t']['hora_fin'] .':' . $min_fin;
					?>
					</br></br>

				</li>
				<?php
		}
	?>
</ul>