<html>
	<?php
		$this->createHead('Create new Schedule Thing', ['somecssfile'],['somejsfile']);
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" style='text-align:center'>
			
			<h1>You're logged in</h1>
			<a href="/create/new">
				<button id='create' class='btn btn-success' type='button'> CREATE </button>
			</a>

			<a href='#'>
        		<button id='edit' class='btn btn-success' type='button'> EDIT </button>
			</a>


		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>