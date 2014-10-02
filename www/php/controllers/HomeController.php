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

			print_r($service->tasklists->listTasklists());
		} else {
			$this->view->authURL = $this->oauth->getAuthUrl();
			$this->view->message = "You're not logged in yet.";
		}

	}

}

?>