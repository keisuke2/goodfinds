<h2>記事追加</h2>

<?php echo $this->Form->create('Topic') ?>
<?php echo $this->Form->input('title',array('type'=>'text'));  ?>
<?php echo $this->Form->input('body',array('type'=>'textarea'));  ?>
<?php echo $this->Form->submit('追加');  ?>
<?php echo $this->Form->end(); ?>
<?php echo $this->Form->input(
	'category_id',array('type' => 'select')); ?>