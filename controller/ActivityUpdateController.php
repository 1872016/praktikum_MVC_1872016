<?php

/**
 * 
 */
class ActivityUpdateController
{
	private $activityDao;

	public function __construct(){
		$this->activityDao = new ActivityDaoImpl();
	}

	public function index(){
		$aid = filter_input(INPUT_GET, 'aid');
		if (isset($aid)) {
			$activity = $this->activityDao->fetchActivity($aid);
		}

		$submitPressed = filter_input(INPUT_POST, "btnSubmit");
		if (isset($submitPressed)) {
			$id = $activity->getId();
			$title = filter_input(INPUT_POST, 'txtTitle');
			$description = filter_input(INPUT_POST, 'txtDescription');
			$place = filter_input(INPUT_POST, 'txtPlace');
			$start_date = filter_input(INPUT_POST, 'txtStartDate');
			$end_date = filter_input(INPUT_POST, 'txtEndDate');
			$faculty_id = filter_input(INPUT_POST, 'txtFacultyId');
			$upAct = new Activity();
			$upAct->setId($id);
			$upAct->setTitle($title);
			$upAct->setDescription($description);
			$upAct->setPlace($place);
			$upAct->setStartDate($start_date);
			$upAct->setEndDate($end_date);
			$upAct->setFacultyId($faculty_id);
			$this->activityDao->updateActivity($upAct);
			if (isset($_FILES['fileDocPhoto']['name'])) {
				$targetDir = 'uploads/';
				$fileExt = pathinfo($_FILES['fileDocPhoto']['name'], PATHINFO_EXTENSION);
				$newName = $activity->getId().'.'.$fileExt;
				$targetPath = $targetDir.$newName;
				$this->activityDao->addPhoto($result, $newName);
				move_uploaded_file($_FILES['fileDocPhoto']['tmp_name'], $targetPath);
			}
			header("location:index.php?menu=act");
		}
		include_once 'pages/activity_update_page.php';
	}
}