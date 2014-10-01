<?php

class SecurityUtils {

	public static function sanitizeURL($value){
		return urlencode(self::sanitize($value));
	}

	public static function sanitize($value) {
		$value = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
		$value = htmlentities($value, ENT_QUOTES, 'UTF-8');
		return $value;
	}

	public static function sanitizeAttribute($value) {
		return self::sanitize($value);
	}

	//TODO: what happens if the token expires RIGHT after we send it.. people would be mad.
	//TODO: maybe a per form token would be best....
	//TODO: this could be refactored
	public static function getCSRFField($form) {

		$token = ApplicationState::getSessionVar('CSRF');
		$expiry = ApplicationState::getSessionVar('CSRF_EXPIRY');

		if(!$token || !$expiry || time() > $expiry) {

			ApplicationState::setSessionVar('CSRF_EXPIRY', time() + 60 * 60); 
			$length = CSRF_LENGTH;
			$crypto = true;
			$token = bin2hex(openssl_random_pseudo_bytes($length, $crypto));

			ApplicationState::setSessionVar('CSRF', $token);
		} 

		return 	'<input type="hidden" name="CSRF" value="'.$token.'" />';

	}

	public static function verifyCSRFToken() {
		$givenToken = ApplicationState::getPostVar("CSRF");
		$realToken = ApplicationState::getSessionVar('CSRF');
		$expiry = ApplicationState::getSessionVar('CSRF_EXPIRY');

		if(!$givenToken || !$realToken || !$expiry) {
			return false;
		}

		if($givenToken == $realToken && time() < $expiry) {
			return true;
		} 

		return false;
	}
}

?>