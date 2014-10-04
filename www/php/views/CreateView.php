<html>
	<?php
		$this->createHead('Create new Schedule Thing');
		$this->createHeader();
		$this->createFooter();
		
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">

			<form action=""> 
				<input type="text" name="field1" value="<?= $this->field1; ?>" />
				<input type="submit" name="submit">
			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>