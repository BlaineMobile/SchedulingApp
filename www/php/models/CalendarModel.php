<?php

class CalendarModel {

	CONST CALENDAR_NAME = 'App Calendar';

	private $user;
	private $calendar;


	public function __construct() {
		require_once('Google/Service/Calendar.php');
		$this->user = ModelFactory::getModel("UserModel");
		$this->getAppCalendar();
		//$this->getAllCalendarEvents();
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
			print("Created Calendar with id: " . $this->calendar->getId());
		}
		print("App Calendar ID: " . $this->calendar->getId() . " SUMMARY: " . $this->calendar->getSummary());
		//return $calendar;
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

		//print_r($eventsList);

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