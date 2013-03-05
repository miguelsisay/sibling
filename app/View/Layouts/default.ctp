<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css('estilo');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('bootstrap');
		echo $this->Html->meta('icon');
		echo $this->Html->script('bootstrap');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a href="/sibling" class="brand">NEREXIS</a>					
					<ul class="nav">
						<li><a href="/sibling/education">¿Quienes Somos?</a></li>
						<li><a href="/sibling/recluta">Procèso de Recluta y Selecciòn</a></li>
						<li><a href="/sibling/perfiles">Pregùntas Frecuentes</a></li>
					</ul>
					<?php
						echo $this->Session->flash('auth');
						echo $this->Form->create('Usuario', array(
							'class' => 'navbar-form pull-right',
							'action' => '/index',
							'inputDefaults' => array(
								'label' => false,
	        					'div' => false	)));
			        	echo $this->Form->input('username', array(
				        	'placeholder' => 'Correo',
				        	'class' => 'input-medium'
				        	 ));
				        echo $this->Form->input('password', array(
			        		'placeholder' => 'Contrasèña',
				        	'class' => 'input-medium'
			        		 ));
						$options = array(
					    'label' => 'Ingresar',
					    'div' => false,
					    'class' => 'btn' );
					 	echo $this->Form->end($options); 
				 	?>
				 	
				</div>
			</div>
		</header>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>
 
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
</body>
</html>
