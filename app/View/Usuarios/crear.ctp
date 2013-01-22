<div class="row-fluid">
	<div class="Formulario de usuarios span8 offset4">
	<?php echo $this->Form->create('Usuario', array('action' => 'login')); ?>
	    <fieldset>
	        <legend><?php echo __('Crear usuario'); ?></legend>
	        <?php echo $this->Form->input('username', array('label' => 'Usuario'));
	        echo $this->Form->input('password', array('label' => 'Contraseña'));
	        echo $this->Form->input('role', array(
	        	'label' => '',
	        	'id' => 'rol',
	            'options' => array('1' => 'Usuario')
	        ));
	    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Crear')); ?>
	</div>
</div>