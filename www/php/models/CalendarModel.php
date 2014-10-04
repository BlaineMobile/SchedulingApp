<?php

class CalendarModel {

	const CALENDAR_NAME = "App Calendar";

	private $user;
	private $calendar;


	public function __construct() {
		require_once('Google/Service/Calendar.php');
		$this->user = ModelFactory::getModel("UserModel");
		getAllCalendarEvents();
	}

	// public function createCalendar() {
	// 	$service = new Google_Service_
	// 	$this->calendar = 
	// }

	public function getAllCalendarEvents() {
		$service = new Google_CalendarService($this->user->getClient());
		$eventsList = [];
		$calList = $service->calendarList->listCalendarList();
		foreach($calList as $cal) {
			$eventsList = array_merge($eventsList, $service->events->listEvents());
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