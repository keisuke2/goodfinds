<div class="row container-side">
	<div class=" col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-1">
		<?php foreach($userdata as $data):?>

			<article class="row">
				<div class="col-sm-3">
					<h3><?php echo $data['created'] ?></h3>
				</div>
				<div class="col-sm-9">
					<h2><?php echo $data['title']; ?></h2>
					<p><?php echo $data['title']; ?></p>
					<p><a href="/view/1">Continue Reading ...</a></p>
					<span class="fa fa-tags"></span>
					<a href="">夏目漱石</a>
					<a href="">小説</a>
					<a href="">明治時代</a>
				</div>
			</article>
<?php endforeach; ?>
	</div>
	<?php echo $this->element('aside'); ?>
	<?php echo $this->element('modal'); ?>
</div>