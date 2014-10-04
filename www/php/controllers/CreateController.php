<?php

class CreateController extends HTMLController {

	public function control(){	
		
		$userModel = ModelFactory::getModel("UserModel");


		/*

		/create/new
			/
			/select


		/create/exist



		*/


		if($this->parameters[0] == "new") {

			if(count($this->parameters) == 0){

				//VALIDATE

				//INVALID
				if(!$valid){
					$this->view  = new View("CreateNewView");
				}


			} else if($this->parameters[1] == "select") {


				$calendarModel = ModelFactory::getModel("CalendarModel");
				$spaces = $calendarModel->findSpace("end"); //list of available spaces

			} else {
				$error404 = ControllerFactory::getErrorController("404Controller");
				$error404->control();
			}

		} else if($this->parameters[0] == "exist") {

		}


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



		$this->view->render();

	}

}

?>