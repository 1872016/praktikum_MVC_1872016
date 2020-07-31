<?php

/**
 * 
 */
class ActivityController
{	
	private $activityDao;
	
	public function __construct()
	{
		$this->activityDao = new ActivityDaoImpl();
	}

	public function index(){
		$command = filter_input(INPUT_GET, 'cmd');
		if(isset($command) && $command == 'del'){
			$aid = filter_input(INPUT_GET, 'aid');
			if (isset($aid)) {
				$delFetch = $this->activityDao->fetchActivity($aid);
				$delPhoto = $delFetch->getDocPhoto();
				if ($delPhoto != null) {
					unlink('uploads/'.$delFetch->getDocPhoto());
				}
				$this->activityDao->deleteActivity($aid);
				echo '<div class="bg-success">Data successfully deleted</div>';
			} 
		}

		$submitPressed = filter_input(INPUT_POST, "btnSubmit");
		if (isset($submitPressed)) {
			$title = filter_input(INPUT_POST, 'txtTitle');
			$description = filter_input(INPUT_POST, 'txtDescription');
			$place = filter_input(INPUT_POST, 'txtPlace');
			$start_date = filter_input(INPUT_POST, 'txtStartDate');
			$end_date = filter_input(INPUT_POST, 'txtEndDate');
			$faculty_id = filter_input(INPUT_POST, 'txtFacultyId');
			$activity = new Activity();
			$activity->setTitle($title);
			$activity->setDescription($description);
			$activity->setPlace($place);
			$activity->setStartDate($start_date);
			$activity->setEndDate($end_date);
			$activity->setFacultyId($faculty_id);
			$result = $this->activityDao->addActivity($activity);
			if (isset($_FILES['fileDocPhoto']['name'])) {
				$targetDir = 'uploads/';
				$fileExt = pathinfo($_FILES['fileDocPhoto']['name'], PATHINFO_EXTENSION);
				$newName = $result.'.'.$fileExt;
				$targetPath = $targetDir.$newName;
				$this->activityDao->addPhoto($result, $newName);
				move_uploaded_file($_FILES['fileDocPhoto']['tmp_name'], $targetPath);
			}
			$result = 1;
			if ($result) {
				echo '<div class="bg-success">Data successfully added (Activity: '. $activity->getTitle() .')</div>';
			} else {
				echo '<div class="bg-error">Error add data</div>';
			}
		} 

		$activities = $this->activityDao->fetchActivityData();
		include_once 'pages/activity_page.php';
	}
}