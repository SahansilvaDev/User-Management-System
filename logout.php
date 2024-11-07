 <?php 

	session_start();


 	//session associate values remove
	$_SESSION = array();


 	//saved session cookie removed
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}

	session_destroy();

	// redirecting the user to the login page
	header('Location: index.php?logout=yes');

 ?>