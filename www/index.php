<?php 
/*
*	This is the godfile.
*	It routes our URLS
*	Loads libraries
*	Handles Sessions
*/

/* To prevent XSS:
    make sure to sanitize ALL user input for html_special entities
    is it being seen inside an HTML tag? No quotes can appear nor any javascript.
    if it's a link make sure it's not javascript
    if it's outside a tag then make sure there's no html in it

    I need to develop a pattern in which any data coming from the client is ALWAYS sanitized. 
    eg my clean class
    But it's also important that database data is okay.
    What about my 404 page and what not, that's dangerous too. If I want to show what page wasn't found then I need sanitize that
    Sanitization should appear before we reach the view.
    Should it happen in the model or not though?


*/
/* To prevent CSRF 
    #1 Prevent XSS
    check referer and origin whenever submitting data
    check for a hidden input make sure it matches one we stored with the session on page load. 
    I can make a function inside of views for creating the token. 
    if any AJAX calls are made I can add a nonce and a clause in the HTTP header to aut 
*/


define('INCLUDE_DIR', dirname(__FILE__) . '/php/' );
define('LIB_DIR', dirname(__FILE__) . '/php/lib/');
define('CSRF_LENGTH', 64);

set_include_path(get_include_path() . ':' . LIB_DIR);

require_once(INCLUDE_DIR . 'mvc.php');
require_once(INCLUDE_DIR . 'ApplicationState.php');
require_once(INCLUDE_DIR . 'SecurityUtils.php');
require_once(INCLUDE_DIR . 'OAuth.php');

$oauth = new OAuth();

session_start();


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $oauth->setAccessToken($_SESSION['access_token']);
}

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$path = trim($path);
$elements = explode('/', $path); 

$controllerName = "";   


if(count($elements)  == 0 || $elements[0] == '') {                  
	$controllerName = "HomeController";
} else if(strstr($elements[0], 'oauth2callback')) {
    $controllerName = "AuthController";
} else switch(strtolower(array_shift($elements))) {
    //TODO: this actually seems like a lot of duplicate code, but having explicit controller names is good in some senses....

    default:
        $controllerName = "Error404Controller";
} 
//TODO: refactor controller calling etc..

$controller = ControllerFactory::getController($controllerName, $elements, $oauth);
$controller->control();
$controller->display();



?>