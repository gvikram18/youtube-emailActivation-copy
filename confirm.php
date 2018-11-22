<?php
	session_start();

	function redirect() {
		header('Location: register.php');
		exit();
	}
	function redirect2(){
		header('Location: www.uniclair.com');
		exit();
	}

	if (!isset($_SESSION['email']) || !isset($_SESSION['token'])) {
		redirect();
	} else {
		$con = new mysqli('localhost', 'root', 'ivtree123', 'action-plan');

		$email = $con->real_escape_string($_SESSION['email']);
		$token = $con->real_escape_string($_SESSION['token']);

		$sql = $con->query("SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");

		if ($sql->num_rows > 0) {
			$con->query("UPDATE users SET isEmailConfirmed=1, token='' WHERE email='$email'");
			echo 'Your email has been verified! You can log in now!';
		} else
			redirect2();
	}
	session_destroy();
	unset($_SESSION['email']);
	unset($_SESSION['token']);
?>