<?php


interface IController {
    public function control();
    public function sendHeaders();
}

abstract class Controller implements IController{
	protected $view;
    protected $parameters;
    protected $oauth;

    public function setParameters($parameters){
        $this->parameters = $parameters;
    }
    
    public function setOAuth($oauth){
        $this->oauth = $oauth;
    }

	public function display(){
		$this->view->render();
	}

}

abstract class HTMLController extends Controller {
    function sendHeaders() {
        header('Content-Type: text/html; charset=utf-8');
    }
}

class ControllerFactory {

    static function getController($controllerName, $parameters, $oauth){
        require_once(INCLUDE_DIR . 'controllers/' . $controllerName . '.php');

        $controller = new $controllerName();
        $controller->setParameters($parameters);
        $controller->setOAuth($oauth);

        return $controller;
    }

}

//TODO: models need work. For example a RESTModel would be handy for external data

abstract class Model {
    
}

abstract class DatabaseModel {
    protected $dataSource;
    private static  $staticDataSource = null;



    public function __construct() {
        $this->dataSource = DatabaseModel::getDataSource();
    }

    public static function getDataSource(){
        if(DatabaseModel::$staticDataSource == null){
            //TODO: fill this out if using database
            $dsn = 'mysql:host=;dbname=;charset=utf8';
            $username = '';
            $password = '';

            DatabaseModel::$dataSource = new PDO($dsn, $username, $password);        
        } 
        return DatabaseModel::$dataSource;
    }
}

class ModelFactory {
    public static function getModel($modelName){
        require_once(INCLUDE_DIR."models/".$modelName.".php");

        $model = new $modelName();
        return $model;
    }
}

class View {

	protected $name;
    protected $data;

    public function __construct($name){
    	$this->name = $name;
    }

    public function render() {
        include(INCLUDE_DIR . 'views/' . $this->name . '.php');
    }

	public function __get($name) {
        if(isset($this->data[$name])) {
            return $this->data[$name];
        }
        return '';
    }

    public function __set($fieldName, $value) {
        $this->data[$fieldName] = $value;
    }

    public function createHead($title, $styles = ['main'], $scripts = []) {
        $head = new View("head");

        $head->styles = $styles;
        $head->scripts = $scripts;
        $head->title = $title;

        $this->head = $head;
    }

    public function createHeader(){
        $header = new View("header");
        //TODO: hmmm
        $header->user = ApplicationState::getLoggedInUserName();
        
        $this->header = $header;
    }

    public function createFooter(){
        $footer = new View("footer");

        $this->footer = $footer;
    }

}



?>