<?php

require_once(LIB_DIR . 'Google/Client.php');

define('CLIENT_ID', '359116550099-77si5fn1e7cs67af72ao4qro0iopdliv.apps.googleusercontent.com');
define('CLIENT_SECRET','IKwV-HFyNcGcZ8-SmRYs9SEj');
define('REDIRECT_URI','http://localhost/oauth2callback');


class UserModel {

	private $client;

	public function __construct() {

		$this->client = new Google_Client();
		$this->client->setClientId(CLIENT_ID);
		$this->client->setClientSecret(CLIENT_SECRET);
		$this->client->setRedirectUri(REDIRECT_URI);

		$this->detectAccessToken();
		
		$this->client->setScopes("https://www.googleapis.com/auth/calendar");
		if($this->client->isAccessTokenExpired()) {
			$authUrl = $this->getAuthUrl();
   			header('Location: ' . filter_var($this->getAuthUrl(), FILTER_SANITIZE_URL));
		}
	}

	public function getAuthUrl() {
		return $this->client->createAuthUrl();
	}

	public function getClient() {
		return $this->client;
	}

	private function detectAccessToken() {

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $this->client->setAccessToken($_SESSION['access_token']);
		}

	}
	public function setAccessToken($token) {
		$this->client->setAccessToken($token);
	}

	public function isAuthed() {
		if($this->client->getAccessToken()) {
			return true;
		}
		return false;
	}
	public function auth() {
		$this->client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $this->client->getAccessToken();
	}

	public function getDefaultAvailableTimes() {
		return [];
	}
}



?>