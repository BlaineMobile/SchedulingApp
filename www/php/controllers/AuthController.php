<?php

class AuthController extends HTMLController {

	public function __construct(){

	}

	public function control(){	
		if (isset($_GET['code'])) {
			//TODO: redirect could be made better
			$this->oauth->auth();
			$redirect = 'http://' . $_SERVER['HTTP_HOST'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}
		//TODO: auth failed

	}

}

?>