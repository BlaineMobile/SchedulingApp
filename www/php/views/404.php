<html>

	<?php 
		$this->createHead('You 404ed');
		$this->createHeader();
		$this->createFooter();

		$this->head->render();

	?>
	<?php $this->header->render(); ?>
	<body>
		Page not found!
	</body>
	<?php $this->footer->render(); ?>
</html>