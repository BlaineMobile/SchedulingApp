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
			<h2> Schedule:</h2>

            <div>
                <a href='/create/new'>
                    <button class='btn btn-success default-button' type='button'> New Event </button>
                </a>
            </div>

            <div class='seperator'>
                <a href='/create/exist' >
                    <button class='btn btn-success default-button' type='button'> Existing Event </button>
                </a>
            </div>

            <div class='page-header'></div>

            <h2> Manage </h2>
            <div>
	            <a href='#'>
	            	<button class='btn btn-success default-button' type='button'> Edit </button>
	            </a>
	        </div>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>