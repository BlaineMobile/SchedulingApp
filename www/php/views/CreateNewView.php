<html>
	<?php
		$this->createHead('Create new Schedule Thing');
		$this->createHeader();
		$this->createFooter();
		
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" class='container'>

			<h1> 
				<?= $this->error; ?>
			</h1>


			<form action="" method="post"> 
				<?= SecurityUtils::getCSRFField("createnew"); ?>
				<h3> Event Name </h3>
				<input class='styled-box' type="text" name="title" value="<?= $this->title; ?>" />
				<h3> Prepare Time Required </h3>
				<input class='styled-box' type="text" pattern="[0-9]+"name="time" value="<?= $this->time; ?>" />
				<h3> Completion Date </h3>
				<input class='styled-box'type="text" name="due" value="<?= $this->due; ?>" />

				<!-- Add advanced settings -->
				<div class='seperator'>
					<input class='green-submit' type="submit" name="submit">
				</div>

			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>
