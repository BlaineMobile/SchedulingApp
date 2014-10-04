<html>
	<?php $this->head->render(); ?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">
			<?php if($this->authURL): ?>
				<a href="<?= $this->authURL;?>">Login!</a>
			<?php else: ?>
				<?php $this->tasksListList->render(); ?>
			<?php endif; ?>
		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>