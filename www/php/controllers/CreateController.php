<?php

class CreateController extends HTMLController {

	public function control(){	
		
		$userModel = ModelFactory::getModel("UserModel");

				$calendarModel = ModelFactory::getModel("CalendarModel");
				$calendarModel->getAllCalendarEvents();


		/*

		/create/new
			/    		Default
			/select     We've submitted stuff and it's valid


		/create/exist

		*/


		//BUG: we forget space parameters once enterring the select space and failing to submit a valid form. Or refreshing page
		//Set state in session before select space?
		//ACTUALLY do we really need to remember the space?
		//But what happens about cleanup

		if($this->parameters[0] == "new") {
			if(count($this->parameters) == 1){

				$validationMessage = $this->validateDefaultForm();

				if(!$validationMessage) {

					$this->selectSpace();

				} else {

					$this->refillDefaultForm($validationMessage);

				}

			} else if($this->parameters[1] == "select") {

				$validationMessage = $this->validateSpaceForm();

				if($validationMessage) {

					$this->selectSpace();

				} else {
					$this->refillSelectForm($validationMessage);
				}

			} else {

				$error404 = ControllerFactory::getErrorController("404Controller");
				$error404->control();

			}

		} else if($this->parameters[0] == "exist") {
			$this->view  = new View("CreateExistView");
		}

		$this->view->render();

	}

	private function refillDefaultForm($reason) {
		$this->view = new View("CreateNewView");

		$this->view->field1 = isset($_POST["field1"]) ? $_POST['field1'] : '' ;
		$this->view->error = $reason;
	}

	private function refillSelectForm($reason) {
		$this->view = new View("SelectView");

		$this->view->field1 = $_POST["field1"];

		if(!isset($_POST['submit'])) {
			$this->view->error = '';
		} else {
			$this->view->error = $reason;
		}


		$spaces = $calendarModel->findSpace("end"); 

		$this->view->spaces = $spaces;

	}

	private function selectSpace() {
		$calendarModel = ModelFactory::getModel("CalendarModel");

		$this->view = new View("SelectView");
	}

	//TODO: this is poor naming
	private function validateDefaultForm() {
		if(!SecurityUtils::verifyCSRFToken()){
			return "CSRF token wasn't found.";
		}

		if(empty($_POST['title'])) {
			return "Yoooo you need a title!";
		}

		if(empty($_POST['time'])) {
			return "Yoooo you need a time!";
		}

		if(empty($_POST['due'])) {
			return "Choose a time you're scheduled thing needs to be due by!";
		}

		//TODO: add advanced settings


		return false;
	}
	private function validateSelectForm() {
		if(!SecurityUtils::verifyCSRFToken()){
			return "CSRF token wasn't found.";
		}
		//TODO: validate select form


		return false;
	}


}

?>