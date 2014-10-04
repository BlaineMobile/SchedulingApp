<?php

class AuthController extends Controller {

	public function control(){	

		if (isset($_GET['code'])) {
			$userModel = ModelFactory::getModel("UserModel");

			$userModel->auth();

			$redirect = 'http://' . $_SERVER['HTTP_HOST'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}
	}
	public function sendHeaders() {
		
	}

}

?>