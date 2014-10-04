<?php

class CreateController extends HTMLController {

	public function control(){	
		
		$userModel = ModelFactory::getModel("UserModel");

		if(!empty($_POST['submit'])) {
			//VALIDATE

			//SUCESS SEND

			//FAIL REPOPULATE FIELDS
			$this->view = new View("CreateView");
			$this->view->field1 = $_POST["field1"];
		} else {
			$this->view = new View("CreateView");
		}

		$this->view->render();

	}

}

?>