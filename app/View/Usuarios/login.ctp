
<div class="row-fluid">

	<div class="login span8 offset4">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('Usuario', array(
			'class' => '',
			'action' => '/'));
		 ?>	
		    <fieldset>
			<legend>
				<?php echo __('Ingresa tus datos.');?>
			</legend>
	        <?php echo $this->Form->input('username', array('placeholder' => '', 'label' => 'Correo', ));
		        echo $this->Form->input('password', array('placeholder' => '', 'label' => 'Contrasèña'));
		    ?>
		    </fieldset>
		<?php 
		$options = array(
			'label' => 'Ingresar',
			'class' => 'btn'	
			);
			echo $this->Form->end($options);
			echo $this->Html->link('Crear usuario.', '/Usuarios/crear', array('class' => 'createuser btn btn-primary'));
		?>
	</div>
</div>
