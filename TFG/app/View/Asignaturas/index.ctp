<h1 align = "center">Lista de asignaturas</h1>

<ul>
	<?php
		foreach($asignaturas as $row){
			?>
				<li>
					<p>
					<?php
						echo 'Nombre: ' . $row['Asignatura']['nombreA'] . ' Cuatrimeste: ' . $row['Asignatura']['cuatrimestre'] . ' nº de creditos: ' . $row['Asignatura']['creditos'] . ' Código: ' . $row['Asignatura']['codigoAsignatura'];
					?>
					</p>
				</li>
			<?php
		}	
	?>
</ul>