<html>
	<?php
		$this->createHead('Create new Schedule Thing');
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" style='text-align:center'>
			<h2> Schedule for:</h2>

            <span>
                <a href='/create/new' >
                    <button class='btn btn-success default-button' type='button'> Existing Event </button>
                </a>
            </span>
            <span>
                <a href='#'>
                    <button class='btn btn-success default-button' type='button'> New Event </button>
                </a>
            </span>
            <div class='page-header'></div>

            <h2> Or </h2>
            <a href='#'>
            	<button class='btn btn-success default-button' type='button'> Edit </button>
            </a>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>