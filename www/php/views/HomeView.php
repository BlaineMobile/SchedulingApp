<html>
	<?php
		$this->createHead('Create new Schedule Thing', ['somecssfile'],['somejsfile']);
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content">
			
			<h1>You're logged in</h1>
			<a href="/create/new">Create new event</a>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>