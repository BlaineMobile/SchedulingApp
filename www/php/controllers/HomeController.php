<?php

class HomeController extends HTMLController {

	public function __construct(){
		$this->view = new View('HomeView');
	}

	public function control(){	

		$this->view->createHead('My Tasks', ['somecssfile'],['somejsfile']);
		$this->view->createHeader();
		$this->view->createFooter();

		require_once('Google/Service/Tasks.php');
		
		if($this->oauth->isAuthed()){
			$service = new Google_Service_Tasks($this->oauth->getClient());
			//$this->view->message = "Oh BOYY look at your tasklists.";
			$tasklists = $service->tasklists->listTasklists();
			$this->view->tasksListList = new View("TasksListList");
			$tasksLists = [];
			foreach($tasklists->getItems() as $item) {
				$tasks[] = $service->tasks->listTasks($item->id);
			}
			$this->view->tasksListList->tasksLists = $tasks;
		} else {
			$this->view->authURL = $this->oauth->getAuthUrl();
			//$this->view->message = "You're not logged in yet.";
		}

	}

}

?>