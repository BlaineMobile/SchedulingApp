<?php

class LogoutController extends Controller {

	public function control(){	

		$_SESSION['access_token'] = '';

		$redirect = 'http://' . $_SERVER['HTTP_HOST'];
		header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		
	}
	public function sendHeaders() {
		
	}

}

?>