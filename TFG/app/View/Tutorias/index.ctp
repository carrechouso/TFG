<h1 align="center">Lista de tutorias</h1>

<ul>
	<?php
	
	$userData = $this->Session->read('userData');
	$userType = $this->Session->read('userType');
	//print_r($tutorias);
	foreach ($tutorias as $valor) {
		$min_inicio = $valor['Tutoria']['minuto_inicio'];
		$min_fin = $valor['Tutoria']['minuto_fin'];
	
		if($min_inicio == '0')
			$min_inicio = '00';
		
		if($min_fin == '0')
			$min_fin = '00';

		if( $userType == 'profesor' ){
			if($valor['Tutoria']['profesor_id'] == $userData[0]['Profesor']['id']){
			?>
				<li> <?php echo $valor['Asignatura']['nombreA'] . ' ' .$valor['Profesor']['nombreP'] . ' ' .$valor['Profesor']['apellidosP'] . ' ' . $valor['Tutoria']['dia'] . ' de ' . $valor['Tutoria']['hora_inicio']. ':' . $min_inicio. ' a ' . $valor['Tutoria']['hora_fin']. ':' . $min_fin. '  '; 
					echo $this->Form->create('Tutoria',array('url' => array('controller' => 'tutorias', 'action' => 'change')));
				    echo $this->Form->input('tutoria',array('type'=>'hidden','value' => $valor['Tutoria']['id']));
					echo $this->Form->end('cambio puntual');
					?>
				</li>
				<?php 
			}
		}else if( $userType == 'admin' ){
			?>
			<li> <?php echo $valor['Asignatura']['nombreA'] . ' ' .$valor['Profesor']['nombreP'] . ' ' .$valor['Profesor']['apellidosP'] . ' ' . $valor['Tutoria']['dia'] . ' de ' . $valor['Tutoria']['hora_inicio']. ':' . $min_inicio. ' a ' . $valor['Tutoria']['hora_fin']. ':' . $min_fin. '  '; 
					echo $this->Form->create('Tutoria',array('url' => array('controller' => 'tutorias', 'action' => 'change')));
				    echo $this->Form->input('tutoria',array('type'=>'hidden','value' => $valor['Tutoria']['id']));
					echo $this->Form->end('cambio puntual');
					?>
				</li>
			<?php 
		}
	}
	?>
	</ul>
	</br>
	</br>
	</br>
	</br>

	<?php
		echo $this->Html->link("Dar de alta tutoría",array('controller' => 'Tutorias', 'action' => 'add'));
		?>
	</br>
