<div id="taskslists">
	<?php 
	foreach($this->tasksLists as $tasksList): 
		$tasksListView = new View("TaskList");
		$tasksListView->tasksList = $tasksList;
		$tasksListView->name = ;
		$tasksListView->render();
	endforeach; 
	?>
</div>