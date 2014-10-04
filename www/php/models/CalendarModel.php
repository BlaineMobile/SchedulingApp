<?php

class CalendarModel {

	CONST CALENDAR_NAME = 'App Calendar';

	private $user;
	private $calendar;


	public function __construct() {
		require_once('Google/Service/Calendar.php');
		$this->user = ModelFactory::getModel("UserModel");
		$this->getAppCalendar();
	}

	public function getAppCalendar() {
		$service = new Google_Service_Calendar($this->user->getClient());
		$calList = $service->calendarList->listCalendarList()->getItems();
		$flag = false;
		foreach ($calList as $cal) {
			if ($cal->getSummary() == self::CALENDAR_NAME) {
				$flag = true;
				$this->calendar = $cal;
			}
		}
		if (!$flag) {
			// Create new Calendar
			$newCalendar = new Google_Service_Calendar_Calendar();
			$newCalendar->setSummary(self::CALENDAR_NAME);
			$newCalendar->setTimezone('America/Edmonton');

			$this->calendar = $service->calendars->insert($newCalendar);
		}
		return $this->calendar;
	}

	public function getFreeTimes($endDate, $requiredTime) {
		$service = new Google_Service_Calendar($this->user->getClient());
		$eventList = $this->getAllCalendarEvents();

		// set default timezone
		date_default_timezone_set('America/Edmonton');

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