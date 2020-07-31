<?php

/**
 * 
 */
class FacultyController
{
	private $facultyDao;

	public function __construct()
	{
		$this->facultyDao = new FacultyDaoImpl();
	}

	public function index(){
		$command = filter_input(INPUT_GET, 'cmd');
		if(isset($command) && $command == 'del'){
			$fid = filter_input(INPUT_GET, 'fid');
			if (isset($fid)) {
				$this->facultyDao->deleteFaculty($fid);
				echo '<div class="bg-success">Data successfully deleted</div>';
			} 
		}

		$submitPressed = filter_input(INPUT_POST, "btnSubmit");
		if (isset($submitPressed)) {
			$name = filter_input(INPUT_POST, "txtName");
			$establish = filter_input(INPUT_POST, 'txtEstablish');
			$faculty = new Faculty();
			$faculty->setName($name);
			$faculty->setEstablish($establish);
			$result = $this->facultyDao->addFaculty($faculty);
			if ($result) {
				echo '<div class="bg-success">Data successfully added (Faculty: '. $name .')</div>';
			} else {
				echo '<div class="bg-error">Error add data</div>';
			}
		}
		$faculties = $this->facultyDao->fetchFacultyData();
		include_once 'pages/faculty_page.php';
	}

}