<div id="spaces">
	<?php
	foreach($this->spacesList as $space):
		$spaceView = new View("Space");
		$spaceView->space = $space;
		$spaceView->render();
	endforeach;
	?>
</div>