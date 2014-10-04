<div id="taskslists">
	<?php 
	foreach($this->tasksLists as $tasksList): 
		$tasksListView = new View("TaskList");
		$tasksListView->tasksList = $tasksList["tasks"];
		$tasksListView->taskListName = $tasksList["name"];
		$tasksListView->render();
	endforeach; 
	?>
</div>