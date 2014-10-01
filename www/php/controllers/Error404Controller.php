<?php 
class Error404Controller extends HTMLController {

	public function __construct(){
		$this->view = new View('404');
	}

	//TODO: is this really the proper way to do this. Maybe this doesn't need its own controller
	//TODO: this url results in an apache 404... http://localhost/http%3A%2F%2Flocalhost%2F

	public function control(){	
		header("HTTP/1.0 404 Not Found");
		$this->view->createHead("Page not found!");
		$this->view->createHeader();
		$this->view->createFooter();
	}

}

?>