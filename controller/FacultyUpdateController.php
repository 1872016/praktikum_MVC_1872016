<?php

/**
 * 
 */
class FacultyUpdateController
{	
	private $facultyDao;

	public function __construct(){
		$this->facultyDao = new FacultyDaoImpl();
	}

	public function index(){
		$fid = filter_input(INPUT_GET, 'fid');
		if (isset($fid)) {
			$faculty = $this->facultyDao->fetchFaculty($fid);
		}

		$submitPressed = filter_input(INPUT_POST, "btnSubmit");
		if (isset($submitPressed)) {
			$id = $faculty->getId();
			$name = filter_input(INPUT_POST, 'txtName');
			$establish = filter_input(INPUT_POST, 'txtEstablish');
			$upFac = new Faculty();
			$upFac->setId($id);
			$upFac->setName($name);
			$upFac->setEstablish($establish);
			$this->facultyDao->updateFaculty($upFac);
			header("location:index.php?menu=fac");
		}
		include_once 'pages/faculty_update_page.php';
	}
}