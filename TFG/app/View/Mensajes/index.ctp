<h1 align ="center">Lista de  mensaje</h1>
 <ul>
 <?php

	foreach($mensajes as $mensaje){
		?>
		<li>
			<?php
				if($mensaje['m']['emisor_id'] == $userId){
					if($userType == 'admin' || $userType == 'alumno'){
						
						echo 'Emisor: ' . $mensaje['a']['nombreAl'] . ' ' . $mensaje['a']['apellidosAl'];
						?></br>
						<?php
						echo 'Receptor: ' . $mensaje['p']['nombreP'] . ' ' . $mensaje['p']['apellidosP'];
						?></br>
						<?php
						echo 'Fecha del mensaje: ' . $mensaje['m']['fecha_mensaje'];
						?></br>
						<?php
						echo 'Mensaje: ' . $mensaje['m']['mensaje'];
						?></br><br>
						<?php
					}else{
						echo 'Emisor: ' . $mensaje['p']['nombreP'] . ' ' . $mensaje['p']['apellidosP'];
						?></br>
						<?php
						echo 'Receptor: ' . $mensaje['a']['nombreAl'] . ' ' . $mensaje['a']['apellidosAl'];
						?></br>
						<?php
						echo 'Fecha del mensaje: ' . $mensaje['m']['fecha_mensaje'];
						?></br>
						<?php
						echo 'Mensaje: ' . $mensaje['m']['mensaje'];
						?></br><br>
						<?php
					}
				}else if($mensaje['m']['receptor_id'] == $userId){
					if($userType == 'admin' || $userType == 'alumno'){
					
						echo 'Emisor: ' . $mensaje['p']['nombreP'] . ' ' . $mensaje['p']['apellidosP'];
						?></br>
						<?php
						echo 'Receptor: ' . $mensaje['a']['nombreAl'] . ' ' . $mensaje['a']['apellidosAl'];
						?></br>
						<?php
						echo 'Fecha del mensaje: ' . $mensaje['m']['fecha_mensaje'];
						?></br>
						<?php
						echo 'Mensaje: ' . $mensaje['m']['mensaje'];
						?>
						</br>
						<?php
						echo 'hola';
						echo $this->Html->link('responder mensaje', array('controller' => 'mensajes', 'action' => 'add', '?' => array('nombre' => $mensaje['p']['nombreP'] , 'apellidos' => $mensaje['p']['nombreP'], 'receptor_id' => $mensaje['m']['emisor_id'], 'emisor_id' => $mensaje['m']['receptor_id'] )));
						?></br><br>
						<?php
					}else{
						echo 'Emisor: ' . $mensaje['a']['nombreAl'] . ' ' . $mensaje['a']['apellidosAl'];
						?></br>
						<?php
						echo 'Receptor: ' . $mensaje['p']['nombreP'] . ' ' . $mensaje['p']['apellidosP'];
						?></br>
						<?php
						echo 'Fecha del mensaje:' . $mensaje['m']['fecha_mensaje'];
						?></br>
						<?php
						echo 'Mensaje: ' . $mensaje['m']['mensaje'];
						?>
						</br>
						<?php
						echo $this->Html->link('responder mensaje', array('controller' => 'mensajes', 'action' => 'add', '?' => array('nombre' => $mensaje['a']['nombreAl'] , 'apellidos' => $mensaje['a']['nombreAl'], 'receptor_id' => $mensaje['m']['emisor_id'], 'emisor_id' => $mensaje['m']['receptor_id'] )));
						?></br><br>
						<?php
					}

				} 
			?>
		</li>
		<?php
	}
?>
</ul>
