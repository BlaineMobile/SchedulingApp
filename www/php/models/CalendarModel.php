<?php

class CalendarModel {

	const CALENDAR_NAME = "App Calendar";

	private $user;
	private $calendar;


	public function __construct() {
		require_once('Google/Service/Calendar.php');
		$this->user = ModelFactory::getModel("UserModel");
		//$this->getAllCalendarEvents();
	}

	// public function createCalendar() {
	// 	$service = new Google_Service_
	// 	$this->calendar = 
	// }

	public function getAllCalendarEvents() {
		$service = new Google_Service_Calendar($this->user->getClient());
		$calList = $service->calendarList->listCalendarList();

		$eventsList = array();

		foreach($calList as $cal) {

			$eventsList = array_merge($eventsList, $service->events->listEvents($cal->id)->getItems());
			
		}

		print_r($eventsList);

		return $eventsList;
	}





	// public function getTasksLists() {
	// 	$service = new Google_Service_Tasks($this->user->getClient());
	// 	return 		$service->tasklists->listTasklists()->getItems();
			
	// }

	// public function getTasks($id) {
	// 	$service = new Google_Service_Tasks($this->user->getClient());
	// 	return $service->tasks->listTasks($id);

	// }

}


?>