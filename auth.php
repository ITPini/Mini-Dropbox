<?php
session_start();
// SQL credentials
$SQL_USER = 'root';
$SQL_PASS = '';
$SQL_HOST = 'localhost';
$SQL_NAME = 'users';

// Try connecting to SQL server
$con = mysqli_connect($SQL_HOST, $SQL_USER, $SQL_PASS, $SQL_NAME);
if (mysqli_connect_error()) {
	// Stop on fail
	exit('Failed to connect to SQL server: ' . mysqli_connect_error());
}

// Prepare SQL query, prevents SQL injection
if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);

  // Execute query
	$stmt->execute();
	// Store the result locally
	$stmt->store_result();

  if ($stmt->num_rows > 0) {
  	$stmt->bind_result($id, $password);
  	$stmt->fetch();
  	// Check if password is identical
  	if ($_POST['password'] === $password) {

  		// Create sessions for the user
  		session_regenerate_id();
  		$_SESSION['loggedin'] = TRUE;
  		$_SESSION['name'] = $_POST['username'];
  		$_SESSION['id'] = $id;
      // Redirect to home.php
  		header('Location: home.php');

      // Generate sub folder for first time users - not sure if this works on non-unix build
      if (!file_exists('./uploads/' . $_SESSION['id'])) {
      mkdir('./uploads/' . $_SESSION['id'], 0777, true);
    }

    // If the username existed but wrong password
  	} else {
  		echo 'Incorrect password!';
  	}
    // If the username was not found in the first place
  } else {
  	echo 'Incorrect username!';
  }
	$stmt->close();
}
?>
