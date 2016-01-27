<h1 align="center"> Lista de usuarios con NIU</h1>
<h1> alumnos  validados</h1>
	<ul><?php
		foreach($validateUsers as $row){
			?>
			<li>
				<?php
					echo $row['a']['nombreAl'] . ' ' . $row['a']['apellidosAl'] . '. NIU: ' . $row['a']['niu'];
					echo $this->form->create('Niukey', array('url' => array('controller' => 'niukeys', 'action' => 'delete')));
					echo $this->form->input('niu', array('type' => 'hidden', 'value' => $row['a']['niu']));
					echo $this->form->end('desahabilitar NIU');
				?>
			</li>
			<?php
		}

	?>
		</ul>
		<br>
		<br>
		<br>
		<h1> alumnos no validados</h1>
		<ul>
			<?php
				foreach($NonvalidateUsers as $row){
					?>
						<li>
							<?php echo $row['a']['nombreAl'] . ' ' . $row['a']['apellidosAl'] . '. NIU: ' . $row['a']['niu'];
							echo $this->form->create('Niukey', array('url' => array('controller' => 'niukeys', 'action' => 'add')));
							echo $this->form->input('niu', array('type' => 'hidden', 'value' => $row['a']['niu']));
							echo $this->form->end('Habilitar NIU');
							?>
						</li>
					<?php
				}
			?>
		</ul>