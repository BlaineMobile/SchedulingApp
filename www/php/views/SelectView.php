<html>
	<?php
		$this->createHead('Select a Scheduled place', ['somecssfile'],['somejsfile']);
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

				<?php 
					$this->spaces = new View("SpaceList");
					$this->spaces->spacesList = $this->spacesList;
					$this->spaces->render();
				?>

				<input type="submit" name="submit">

			</form>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>