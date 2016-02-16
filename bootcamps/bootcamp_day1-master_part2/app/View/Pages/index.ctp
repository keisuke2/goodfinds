<div class="row container-side">
	<div class=" col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-1">
		<?php foreach($topics as $topic): ?> 
			<article class="row">
				<div class="col-sm-3">
					<h3><?php echo $topic['Topic']['created']; ?></h3>
				</div>
				<div class="col-sm-9">
					<h2><?php echo $topic['Topic']['title'];?></h2>
				 <button type="button" class="btn btn-default">

				 	<?php echo $this->Form->postlink(
				 		'Delete',
				 		array('controller'=>'topics','action' => 'delete',$topic['Topic']['id']),
				 		array(),
				 		'削除しますか?',
				 		$topic['Topic']['id']
				 		)
				 		;?>
				 	</button>
					<p><?php echo $topic['Topic']['body'];  ?></p>
					<p><a href="/detail/1">Continue Reading ...</a></p>
					<span class="fa fa-tags"></span>

					<a href="/cake/categories/view1">
						<?php
						echo $topic['Category']['name']?>
                   </a>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php echo $this->element('aside'); ?>
	<?php echo $this->element('modal'); ?>
</div>