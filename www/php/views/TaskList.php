<h1><?= $this->name; ?></h1>

<div id="<?= $this->name; ?>">
	<?php 
	foreach($this->tasksList as $task): 
		$taskView = new View("Task");
		$taskView->task = $task;
		$taskView->render();
	endforeach; 
	?>
</div>