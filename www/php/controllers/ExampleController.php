<?php

class FeedController extends HTMLController {

	public function __construct(){
		$this->view = new View('ExampleView');
	}

	public function control(){	
		$this->view->createHead('Title', ['somecssfile'],['somejsfile']);
		$this->view->createHeader();
		$this->view->createFooter();

		$itemModel = ModelFactory::getModel('ExampleModel');
		$items = $itemModel->getXXXX(10);

		$itemList = new View("ExampleList");
		$itemList->items = $items;

		$this->view->itemList = $itemList;
	}

}

?>