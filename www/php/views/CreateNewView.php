<html>
	<?php
		$this->createHead('Create new Schedule Thing', ['general'],['somejsfile']);
		$this->createHeader();
		$this->createFooter();
		
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">

			<form action="" method="post"> 
				<?= SecurityUtils::getCSRFField("createnew"); ?>
				<input type="text" name="title" value="<?= $this->field1; ?>" />
				<input type="text" name="time" value="<?= $this->field1; ?>" />

				<input type="submit" name="submit">
			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>