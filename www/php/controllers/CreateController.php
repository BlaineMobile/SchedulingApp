<?php

class CreateController extends HTMLController {

	public function control(){	
		
		$userModel = ModelFactory::getModel("UserModel");



		// if($this->params[0] == "new") {


		// 	if($this->params == 0){
		// 		if(!empty($_POST['submit'])) {
		// 		//VALIDATE

		// 		$valid = true;

		// 		if($valid){
		// 			$this->view = new View("SelectView");
		// 		} else {
		// 			//FAIL REPOPULATE FIELDS
		// 			$this->view = new View("CreateNewView");
		// 			$this->view->field1 = $_POST["field1"];
		// 		}
				
		// 		} else {
		// 			$this->view = new View("CreateNewView");
		// 		}

		// 	} else if ($this->params[0] == "select") {
		// 		$this->view  = new View("CreateExistView");
		// 	}


		// 	} else if ($this->params[0] == "existing") {
		// 		$this->view  = new View("CreateExistView");
		// 	}


		$this->view  = new View("CreateNewView");

		$this->view->render();

	}

}

?>