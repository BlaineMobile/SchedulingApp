<html>
	<?php
		$this->createHead('Create new Schedule Thing', ['general'],['somejsfile']);
		$this->createHeader();
		$this->createFooter();
		$this->head->render(); 
	?>
	<body>
		<?php $this->header->render(); ?>

		<div id="content" style='text-align:center'>
			<h2> Schedule for... </h2>

            <div class='page-header'></div>
            <span>
                <a href='/create/new' >
                    <button class='btn btn-success screen-wide-button' type='button'> Existing Event </button>
                </a>
            </span>
            <span>
                <a href='#'>
                    <button class='btn btn-success screen-wide-button' type='button'> New Event </button>
                </a>
            </span>
            <h2> Or...</h2>
            <a href='#'>
            	<button class='btn btn-success screen-wide-button' type='button'> Edit </button>
            </a>

		</div>

		<?php $this->footer->render(); ?>

	</body>

</html>