<?php

class HomeController extends HTMLController {

	public function control(){	


		$userModel = ModelFactory::getModel("UserModel");

		
		if($userModel->isAuthed()){
			$this->view = new View('HomeView');
		} else {
			$this->view = new View('LoginView');
			$this->view->authURL = $userModel->getAuthUrl();
		}

		$this->view->render();

	}

}

?>