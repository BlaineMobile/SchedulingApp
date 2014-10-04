<?php

class HomeController extends HTMLController {

	public function control(){	
		$this->view = new View('HomeView');


		$userModel = ModelFactory::getModel("UserModel");

		$this->view->createHead('My Tasks', ['somecssfile'],['somejsfile']);
		$this->view->createHeader();
		$this->view->createFooter();
		
		if($userModel->isAuthed()){
			$tasksModel = ModelFactory::getModel("TasksModel");

			$this->view->tasksListList = new View("TasksListList");
			$taskLists = $tasksModel->getTasksLists();
			
			$tasks = [];

			foreach($taskLists as $tasklist) {
				$tasks[] = ["name" => $tasklist->title, "tasks" => $tasksModel->getTasks($tasklist->id)];
			}
			
			$this->view->tasksListList->tasksLists = $tasks;

		} else {
			$this->view->authURL = $userModel->getAuthUrl();
		}

		$this->view->render();

	}

}

?>