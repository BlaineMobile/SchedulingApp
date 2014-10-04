<?php

class CalendarModel {

	const CALENDAR_NAME = "App Calendar";

	private $user;
	private $calendar;


	public function __construct() {
		require_once('Google/Service/Calendar.php');
		$this->user = ModelFactory::getModel("UserModel");
	}

	// public function createCalendar() {
	// 	$service = new Google_Service_
	// 	$this->calendar = 
	// }

	public function getAllCalendarEvents() {
		$service = new Google_Service_Calendar($this->user->getClient());
		$calList = $service->calendarList->listCalendarList()->getItems();

		$eventsList = array();

		foreach($calList as $cal) {

			$eventsList = array_merge($eventsList, $service->events->listEvents($cal->id)->getItems());

		}

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


class Space {
	public $date;
	public $duration;
	
	function __construct($date, $duration) {
		$this->date = $date;
		$this->duration = $duration;
	}


}


?>