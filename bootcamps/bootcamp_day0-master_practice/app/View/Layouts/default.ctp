<!DOCTYPE html>
<html lang="ja">
<head>
	<?php echo $this->Html->charset(); ?>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('stylesheet');
	echo $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/
		css/font-awesome.min.css');

	?>
</head>
<body>
	<?php echo $this->element('navbar'); ?>
	<div class="container-fluid">
		<?php echo $this->element('header'); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('footer');?>
		<?php echo $this->element('lazy-loading'); ?>

	</div>
</body>
</html>
