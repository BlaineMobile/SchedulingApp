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

			<h1> 
				<?= $this->error; ?>
			</h1>


			<form action="" method="post"> 
				<?= SecurityUtils::getCSRFField("createnew"); ?>
				<input type="text" name="title" value="<?= $this->title; ?>" />
				<input type="text" name="time" value="<?= $this->time; ?>" />
				<input type="text" name="date" value="<?= $this->date; ?>" />


				<input type="submit" name="submit">
			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>