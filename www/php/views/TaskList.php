<h1><?= $this->taskListName; ?></h1>

<div id="<?= $this->taskListName; ?>">
	<?php 
	foreach($this->tasksList as $task): 
		$taskView = new View("Task");
		$taskView->task = $task;
		$taskView->render();
	endforeach; 
	?>
</div>