<?php

//Handles post, session, user etc.

class ApplicationState {

	public static function getLoggedInUserId () {
		return self::getSessionVar('user_id');
	}

	public static function getLoggedInUserName () {
		return self::getSessionVar('user_name');
	}

	public static function isUserLoggedIn() {
		if(self::getSessionVar('user_id')) {
			return true;
		}
		return false;	
	}

	public static function logout() {
		self::removeSessionVar('user_name');
		self::removeSessionVar('user_id');
	}

	public static function setRedirectPoint() {
		//BUG: navigate to login, navigate somewhere else without logging in, navigate to login and login. you're redirected to wrong spot
		//Can be fixed by checking if referer is no longer the same page... or something 
		//Kinda fixed I believe
		$redirect = ApplicationState::getSessionVar('redirect');

		//TODO: I need to sanitize this, I don't want them redirected to another site (I don't think....) CSRF should protect anyb attacks though....

		if(!$redirect) {
			$referer = self::getServerVar('HTTP_REFERER');
			if($referer) {
				$redirect = $referer;
			} else {
				$redirect = '/';
			}
			self::setSessionVar('redirect', $redirect);
		}
	}

	public static function removeRedirectPoint(){
		self::removeSessionVar('redirect');
	}

	public static function restoreRedirectPoint(){
		header('Location: '.self::getSessionVar('redirect'));
		self::removeRedirectPoint();
		exit();
	}
	public static function loginUser ($username, $pass){

		$user = ModelFactory::getModel('UserModel');

		$login = $user->getUserLogin($username);

		if($login) {
			if(password_verify($pass, $login->password)) {
				self::setSessionVar('user_id', $login->user_id);
				self::setSessionVar('user_name', $login->name);

				return true;
			}
		}
		return false;
	}


	//TODO: lotsa repetition here and everything needs to be sanitized
	public static function getPostVar($name) {
		if(isset($_POST[$name])){
			return $_POST[$name];
		} 

		return false;	
	}

	public static function getServerVar($name){
		if(isset($_SERVER[$name])){
			return $_SERVER[$name];
		} 

		return false;	

	}

	public static function getSessionVar($name) {
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		} 

		return false;
	}

	public static function removeSessionVar($name) {
		unset($_SESSION[$name]);
	}

	public static function setSessionVar($name, $value) {
		$_SESSION[$name]  = $value;
	}

}

?>