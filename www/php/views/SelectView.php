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
			<form >
			</form>
		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>