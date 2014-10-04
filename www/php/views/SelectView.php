<html>
	<?php
		$this->createHead('Select a Scheduled place');
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">
			
			<h1>Select from our stuff</h1>

			<form action="/" method="post"> 
				<?= SecurityUtils::getCSRFField("select"); ?>
				<input type="text" name="field1" value="<?= $this->field1; ?>" />
				<input type="submit" name="submit">

			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>