<h1 align="center"> Lista de Profesores</h1>

</ul>
	<?php
		foreach($data as $row){
			?>
				<li><div>
						<?php 
							echo 'Nombre Completo: ' . $row['Profesor']['nombreP'] . $row['Profesor']['apellidosP'];?>
							</br><?php
							echo 'Nombre de usuario: ' . $row['Profesor']['usuarioP'];?>
					</div>
					</br></br>
					</li>
			<?php
		}

?>
</ul>