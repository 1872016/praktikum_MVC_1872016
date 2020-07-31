<?php

/**
 * 
 */
class UserController
{
	private $userDao;

	public function __construct(){
		$this->userDao = new UserDaoImpl();
	}

	public function index(){
		$signInPressed = filter_input(INPUT_POST, 'btnSignIn');
		if ($signInPressed) {
			$username = filter_input(INPUT_POST, 'txtUsername');
			$password = filter_input(INPUT_POST, 'txtPassword');
			$md5Password = md5($password);
			$user = $this->userDao->login($username,$md5Password);
			if ($user != null && $user->getUsername() == $username) {
				$_SESSION['my_session'] = true;
				$_SESSION['session_user'] = $user->getName();
				header("location:index.php");
			} else {
				echo '<div class="bg-error">Invalid username or password</div>';
			}
		}
		include_once 'pages/login_page.php';
	}

	public function logout(){
		session_unset();
		session_destroy();
		header('location:index.php');
	}
}