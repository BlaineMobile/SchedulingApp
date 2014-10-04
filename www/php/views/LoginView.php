<html>
	<?php
		$this->createHead('Create new Schedule Thing');
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" style='text-align:center'>
			<a href="<?= $this->authURL;?>">
				<button id='login' class='btn btn-success circle-button' type='button'> LOGIN </button> 
			</a>
		</div>

		<?php $this->footer->render(); ?>
	</body>
</html>