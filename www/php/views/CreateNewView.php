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

				<h4> Event Name </h4>
				<div class="input-group">
				  <span class="input-group-addon">Aa</span>
				  <input class='styled-box form-control' type="text" name="title" value="<?= $this->title; ?>" />
				</div>

				<h4> Prepare Time Required (Hours)</h4>
				<div class="input-group">
				  <span class="input-group-addon">##</span>
				  <input class='styled-box form-control' type="text" pattern="[0-9]+"name="time" value="<?= $this->time; ?>" />
				</div>

				<h4> Completion Date </h4>
				<div class="input-group">
					<span class="input-group-addon"></span>
					<input class='styled-box form-control'type="text" name="due" value="<?= $this->due; ?>" />
				</div>

				<div id='advancedSettings' style='display:none'>
					<h4> Advanced Holder 1</h4>
					<div class="input-group">
						<span class="input-group-addon">:)</span>
						<input class='styled-box form-control'type="text" name="due" value="<?= $this->due; ?>" />
					</div>
				</div>

				<!-- Add advanced settings -->
				<div class='seperator'> <button class='btn btn-primary' id='toggle-settings' type='button'>Show Advanced Settings </button></div>

				<div class='seperator'>
					<input class='green-submit' type="submit" name="submit">
				</div>

			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>
