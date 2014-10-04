<?php

class CalendarModel {

	CONST CALENDAR_NAME = 'App Calendar';

	private $user;
	private $calendar;


	public function __construct() {
		date_default_timezone_set('America/Edmonton');
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

		// set default timezone
		date_default_timezone_set('America/Edmonton');

		$events = $this->getAllCalendarEvents(new DateTime(), $endDate);

		//Find free time

		//round now till first second of tomorrow

		$availableStart = 9;
		$availableDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

		$free = [];

		$cur = new DateTime();
		$cur->modify("+1 day");
		$cur->setTime(0,0,0);

		for($cur = time(); $cur < $endDate->getTimeStamp(); $cur += 24*60*60) {

			if(!in_array(date('D', $cur), $availableDays)) {
				continue;
			}

			$start = $cur + $availableStart*60;

			//$length = $availableEnd - $availableStart;
			$length = 8;

			//$end = $start + $length*60;

			$free[] = new Duration($start, $length*60*60);

		}

		//recursively add compute intersection into free or whatefer

		foreach($free as $currentTime) {
			foreach() {
				$currentTime->computeIntersection();
			}
		}




	}

	// public function createCalendar() {
	// 	$service = new Google_Service_
	// 	$this->calendar = 
	// }
	public function getBusyTimes($start, $end) {
		$service = new Google_Service_Calendar($this->user->getClient());
		
		$calList = $service->calendarList->listCalendarList()->getItems();
		$items = array();
		foreach ($calList as $cal) {
			$item = new Google_Service_Calendar_FreeBusyRequestItem();
			$item->setId('{' . $cal->id . '}');
			$items[] = $item;
		}

		$freebusy_req = new Google_Service_Calendar_FreeBusyRequest();
		$freebusy_req->setTimeMin($start->format('Y-m-d\TH:i:sP'));
		$freebusy_req->setTimeMax($end->format('Y-m-d\TH:i:sP'));
		$freebusy_req->setTimeZone('America/Edmonton');
		$freebusy_req->setItems($items);
		$query = $service->freebusy->query($freebusy_req);

		return $query;
	}

	public function getAllCalendarEvents($start, $due) {

		$optparam = ["timeMax" => $start, "timeMin" => $due];

		$service = new Google_Service_Calendar($this->user->getClient());
		$calList = $service->calendarList->listCalendarList()->getItems($optparam);

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


class Duration {
	public $start;
	public $duration;
	public $end;
	
	function __construct($start, $end) {
		$this->start = $stat;
		$this->end = $end;
	}

	public function computeIntersection($dur2) {
		//dur2 has start and end
		//If dur2 is within this duration


		//Start and END both in
		if($dur2->start > $this->start && $dur2->end < $this->end) {
			return [new Duration($this->start, $cur2->start), new Duration($cur2->end, $this->end)];
		}

		//whole thing encompassed
		} else if($dur2->start < $this->start && $dur2->end > $this->end) {
			return null;

		//start in end not
		} else if($dur2->start > $this->start && $dur2->start < $this->end && $dur2->end > $this->end) {
			return new Duration($this->start, cur2->start);
		//end in start not
		} else if($dur2->start < $this->start && $dur2->end < $this->end && $dur2->end > $this->start) {
			return new Duration(cur2->end, this->end);
	
		} else {
			return this;
		} 
	} 


}




?>