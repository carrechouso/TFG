<?php
	
	class TutoriasController extends AppController {

		 public function index(){

			if($this->request->is('get')){
				$data = $this->Tutoria->find('all');
				$this->set('tutorias', $data);
			}
		}
	
		 public function add(){//comprobar que non exista unha tutoria con eses mismos datos

		 	if($this->request->is('post')){
		 		
		 		$userType = $this->Session->read('userType');
				$this->loadModel('Profesor');
				$id_profesor = $this->request->data['Tutoria']['profesor_id'];

				if($userType == 'admin'){
					$prof = $this->Profesor->find('count', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Tutoria']['profesor_id'])));					
						if($prof != 0){
					
							$id_P = $this->Profesor->find('all', array('conditions'=> array('Profesor.usuarioP =' => $this->request->data['Tutoria']['profesor_id'])));		
							$id_profesor = $id_P[0]['Profesor']['id']; 
						}
				}else{
					$prof = $this->Profesor->find('count', array('conditions'=> array('Profesor.id =' => $this->request->data['Tutoria']['profesor_id'])));
				}
				
				$this->loadModel('Asignatura');
				$asig = $this->Asignatura->find('count', array('conditions'=> array('Asignatura.codigoAsignatura =' => $this->request->data['Tutoria']['asignatura_id'])));

				if($prof == 1 && $asig == 1){
			 		if($this->Tutoria->validates()){
			 			$id_A = $this->Asignatura->find('all', array('conditions'=> array('Asignatura.codigoAsignatura =' => $this->request->data['Tutoria']['asignatura_id'])));
			 			$save = array('asignatura_id' => $id_A[0]['Asignatura']['id'], 'profesor_id' => $id_profesor, 'dia' => $this->request->data['Tutoria']['dia'], 'despacho' => $this->request->data['Tutoria']['despacho'], 'hora_inicio' => $this->request->data['Tutoria']['hora_inicio']['hour'], 'hora_fin' => $this->request->data['Tutoria']['hora_fin']['hour'], 'minuto_inicio' => $this->request->data['Tutoria']['minuto_inicio']['min'], 'minuto_fin' => $this->request->data['Tutoria']['minuto_fin']['min']);
			 			//print_r($id_A);
			 			$this->Tutoria->save($save);
	 					$data = $this->Tutoria->find('all');
						$this->set('tutorias', $data);
	 					$this->Flash->success('Tutoria registrada correctamente');
						return $this->redirect(array('controller' => 'Tutorias', 'action' => 'index'));
			 		}
		 		}else{
		 			$this->Flash->set($prof .' Id de profesor y/o asignatura incorrecta ' . $asig);
		 		}
		 	}
		 }

		 public function change(){
		 	if($this->request->is('post')){
		 		print_r($this->request->data);
		 		$this->set('id_tutoria',$this->request->data['Tutoria']['tutoria']);
		 		$this->set('id_profesor',$this->request->data['Tutoria']['profesor']);
		 	}
		 }


		 public function generarCalendario(){

		 		$this->loadModel('Asignatura');
		 		if($this->request->is('get')){
		 			$this->set('asignaturas', $this->Asignatura->find('all'));
		 		}

		 		if($this->request->is('post')){
					
					$num =  $this->Asignatura->find('count');
					$this->set('asignaturas', $this->Asignatura->find('all'));
		 			
		 			$eol = "\r\n";//fin de linea do arquivo .ics
		 			$fechaInicio = explode("/",$this->request->data['Asignatura']['fechaInicio']);
		 			$fechaFin = explode("/",$this->request->data['Asignatura']['fechaFin']);
		 			$now = strtotime($fechaInicio[2] . '-' . $fechaInicio[0] . '-' .$fechaInicio[1]); // or your date as well
     				$your_date = strtotime($fechaFin[2] . '-' . $fechaFin[0] . '-' .$fechaFin[1]); 
     				$datediff = $your_date - $now;
     				$numDias = floor($datediff/(60*60*24));//o mellor facer absoluto 
     			

     				$fecha = new DateTime($fechaInicio[2] . '-' . $fechaInicio[0] . '-' .$fechaInicio[1]);
     				
				 	$load = "BEGIN:VCALENDAR" . $eol .
   							 "VERSION:2.0" . $eol .
    						 "PRODID:-//project/author//NONSGML v1.0//EN" . $eol .
    						 "CALSCALE:GREGORIAN" . $eol;

		 			for($i = 1; $i <= $this->request->data['Asignatura']['numeroFilas']; $i++){
		 				if(isset($this->request->data['Asignatura'][$i])){
		 					$fechaIn = $fecha;
		 					$datos = $this->Tutoria->find('all',array('conditions' => array('Tutoria.asignatura_id =' =>  $this->request->data['Asignatura'][$i])));
		 					$this->loadModel('CambPuntual');
		 					//cambio puntual mirar se hai e polos
		 					//facer algo con cambio puntual para saber o dia no que lle tocabaEX: meter na bd o dia anterior a fecha e hora inicio e sustituilo pola nova
			 				foreach($datos as $row){
			 					$fechaIn = $fecha;
			 					//print_r( $row );
			 					
			 					for($j = 0; $j < $numDias; $j++){
			 						//echo $j;
			 						$fechaIn->add(new DateInterval('P1D'));
									$fechaString = $fechaIn->format('Y-m-d');
									$result = date('w', strtotime($fechaString));
								 
								  
								    if( $this->getDay($result) == $row['Tutoria']['dia']){
									  	$numCambios = $this->CambPuntual->find('count', 
									  				  array('conditions' => array('CambPuntual.diaCambio =' => $fechaString, 
									  				  							  'CambPuntual.tutoria_id' => $row['Tutoria']['id'],
									  				  							  'CambPuntual.profesor_id =' => $row['Profesor']['id'])));
									   //print_r($row);
										if($numCambios == 0){
										   $hora_ini = $row['Tutoria']['hora_inicio'];
										   $hora_fin = $row['Tutoria']['hora_fin'];
										   $minuto_ini = $row['Tutoria']['minuto_inicio'];
										   $minuto_fin = $row['Tutoria']['minuto_fin'];	
										   
										  if($hora_fin < 10){
										   		$hora_fin = '0' . $hora_fin; 
										   	}
										   	if($hora_ini < 10){
										   		$hora_ini = '0' . $hora_ini; 
										   	}
										   	if($minuto_ini < 10){
										   		$minuto_ini = '0' . $minuto_ini; 
										   	}
										   	if($minuto_fin < 10){
										   		$minuto_fin = '0' . $minuto_fin; 
										   	}
										   	$fechaArray = explode( "-",$fechaString); 
					 						$vend = $fechaArray[0] . $fechaArray[1] . $fechaArray[2] . 'T' . $hora_fin . $minuto_fin . '00' . 'Z';
					 						$vstart = $fechaArray[0] . $fechaArray[1] . $fechaArray[2] . 'T' . $hora_ini . $minuto_ini . '00' . 'Z';
				 							
				 							$load = $load ."BEGIN:VEVENT" . $eol .
		    									   "DTEND;TZID=Europe/Madrid:" . $vend . $eol .
												   "UID:" . $row['Asignatura']['nombreA'] . $row['Profesor']['id'] . $row['Tutoria']['dia'] .$hora_ini . $eol .
												   "DTSTAMP:" . $this->dateToCal(time()) . $eol .
												   "DESCRIPTION: Asignatura: " . htmlspecialchars($row['Asignatura']['nombreA'] . ' :' .$row['Profesor']['nombreP'] . ' ' . $row['Profesor']['apellidosP']) . $eol .
												   "URL;VALUE=URI:" . htmlspecialchars(('http://gestiontutorias.com')) . $eol .
												   "SUMMARY:" . htmlspecialchars($row['Asignatura']['nombreA']) . $eol .
												   "DTSTART;TZID=Europe/Madrid:" . $vstart . $eol .
												   "END:VEVENT" . $eol;	
												   	echo 'no cambio';
				 						}else{
				 							echo 'cambio';
				 							$cambios = $this->CambPuntual->find('all', 
									  				  array('conditions' => array('CambPuntual.diaCambio =' => $fechaString, 
									  				  							  'CambPuntual.tutoria_id' => $row['Tutoria']['id'],
									  				  							  'CambPuntual.profesor_id =' => $row['Profesor']['id'])));
					 						foreach($cambios as $cambio){
					 							 $hora_ini = $cambio['CambPuntual']['hora_inicio'];
										  		 $hora_fin = $cambio['CambPuntual']['hora_fin'];
										   		 $minuto_ini = $cambio['CambPuntual']['minuto_inicio'];
										   		 $minuto_fin = $cambio['CambPuntual']['minuto_fin'];	
										   
										  if($hora_fin < 10){
										   		$hora_fin = '0' . $hora_fin; 
										   	}
										   	if($hora_ini < 10){
										   		$hora_ini = '0' . $hora_ini; 
										   	}
										   	if($minuto_ini < 10){
										   		$minuto_ini = '0' . $minuto_ini; 
										   	}
										   	if($minuto_fin < 10){
										   		$minuto_fin = '0' . $minuto_fin; 
										   	}
										   	$fechaArray = explode( "-",$cambio['CambPuntual']['dia']); 
					 						$vend = $fechaArray[0] . $fechaArray[1] . $fechaArray[2] . 'T' . $hora_fin . $minuto_fin . '00' . 'Z';
					 						$vstart = $fechaArray[0] . $fechaArray[1] . $fechaArray[2] . 'T' . $hora_ini . $minuto_ini . '00' . 'Z';


					 							$load = $load ."BEGIN:VEVENT" . $eol .
		    									   "DTEND;TZID=Europe/Madrid:" . $vend . $eol .
												   "UID:" . $row['Asignatura']['nombreA'] . $row['Profesor']['id'] . $row['Tutoria']['dia'] .$hora_ini . $eol .
												   "DTSTAMP:" . $this->dateToCal(time()) . $eol .
												   "DESCRIPTION: Asignatura: " . htmlspecialchars($row['Asignatura']['nombreA'] . ' :' .$row['Profesor']['nombreP'] . ' ' . $row['Profesor']['apellidosP']) . $eol .
												   "URL;VALUE=URI:" . htmlspecialchars(('http://gestiontutorias.com')) . $eol .
												   "SUMMARY:" . htmlspecialchars($row['Asignatura']['nombreA']) . $eol .
												   "DTSTART;TZID=Europe/Madrid:" . $vstart . $eol .
												   "END:VEVENT" . $eol;	
					 						}

				 						}
				 						//comprobar cambio puntual e coller dia da semana e meter datos
				 						
									}
								}
							}
		 				}
		 			}
		 			$load = $load . "END:VCALENDAR";
		 			$filename="Event-Tutorias.ics";
					// Set the headers
				   header( "Content-Type: text/calendar; charset=UTF-8");
				    header('Content-Disposition: attachment; filename=' . $filename);

				    // Dump load
				    echo $load;
		 			//print_r($this->Tutoria->find('all', array('conditions' =>('Tutoria.id = 7'))));
		 			//print_r($this->Tutoria->findAllById(7));

//********************************************************************************************************************
		 			//generar o calendario colleando os datos das tutorias e dos profesores
		 			//mirar de ofrecer tamen os distintos profesores pondo nome do prfesor no calendario ou por separado
		 			//revisar o inicio e fin dos cuatrimestres creando tabla ou algo
		 			//pedir duración do calendario a crear
		 		}
						 	
		 	}

		 function getDay($numDay){

			switch ($numDay) {
				case 1:
					return 'lunes';
					break;
				case 2:
					return 'martes';
					break;
				case 3:
					return 'miercoles';
					break;
				case 4:
					return 'jueves';
					break;
				case 5:
					return 'viernes';
					break;
				default:
					return 'domingo';
			}
		}

		function dateToCal($timestamp) {
 		 return date('Ymd\Tgis\Z', $timestamp);
}
	}
?>