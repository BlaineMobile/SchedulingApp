<html>
	<?php $this->head->render(); ?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">
			<a href="<?= $this->authURL;?>">Login!</a>
			<?= $this->message; ?>
			<?php $this->tasksListList->render(); ?>
		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>