<div id="items">
	<?php 
	foreach($this->tasks as $task): 
		$taskView = new View("Task");
		$taskView->task = $task;
		$taskView->render();
	endforeach; 
	?>
</div>