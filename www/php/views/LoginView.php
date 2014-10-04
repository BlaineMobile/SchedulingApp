<html>
	<?php
		$this->createHead('Create new Schedule Thing', ['general'],['somejsfile']);
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" style='text-align:center'>
			<a href="<?= $this->authURL;?>">
				<button id='login' class='btn btn-success' type='button'> LOGIN </button> 
			</a>
		</div>

		<?php $this->footer->render(); ?>
	</body>
</html>