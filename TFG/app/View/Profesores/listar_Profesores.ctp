<h1 align = "center">Lista de profesores</h1>
<ul>
	<?php
		foreach ($profesores as $profesor){
			?>
				<li> 
					<?php 
						echo $this->Html->Link($profesor['Profesor']['nombreP'] . ' ' . $profesor['Profesor']['apellidosP'], array('controller' => 'Profesores', 'action' => 'datosProfesor','?' => array('profesor_id' => $profesor['Profesor']['id'], 'nombreP' => $profesor['Profesor']['nombreP'], 'apellidosP' => $profesor['Profesor']['apellidosP'])));
					?>
				</li>
				<?php
		}
	?>
</ul>