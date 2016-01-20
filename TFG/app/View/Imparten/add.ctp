<h1 align = "center"> Lista de asignaturas </h1>
<?php 
	$userData = $this->Session->read('userData');
	$userType = $this->Session->read('userType');
	//print_r($userData);
	//echo $userType;
	
	foreach($data as $row){
		?><p>
			<?php 
				echo 'Nombre: ' . $row['Asignatura']['nombreA'] . ' Numero de creditos:' . $row['Asignatura']['cuatrimestre'] . ' cuatrimestre:' . $row['Asignatura']['cuatrimestre'] . ' código asignatura:' . $row['Asignatura']['codigoAsignatura'];   
				
				if($userType == 'admin'){
					echo $this->Form->create('Imparte', array('url' => array('controller' => 'imparten','action' => 'add')));
					echo $this->Form->Input('asignatura_id', array('type' => 'hidden', 'value' => $row['Asignatura']['id'])); 
					echo $this->Form->Input('profesor_id', array('type' => 'hidden', 'value' => $userData[0]['Alumno']['id']));
					echo $this->Form->End('Darse de alta como docente');

				}else if($userType == 'profesor'){
					echo $this->Form->create('Imparte', array('url' => array('controller' => 'imparten','action' => 'add')));
					echo $this->Form->Input('asignatura_id', array('type' => 'hidden', 'value' => $row['Asignatura']['id'])); 
					echo $this->Form->Input('profesor_id', array('type' => 'hidden', 'value' => $userData[0]['Profesor']['id']));
					echo $this->Form->End('Darse de alta como docente');
				}
				
			?>	
			
		</p>
		<?php
	}
?>