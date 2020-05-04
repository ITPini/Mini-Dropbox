<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Mini-Dropbox</h1>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    <hr>

  <form action="upload.php" method="post" enctype="multipart/form-data">
    Please select a file to upload <br>
    <input type="file" name="upload_file" value="upload_file">
    <input type="submit" name="Upload Image" value="submit">
  </form>
    <br>
  </body>
</html>

<?php
session_start();

// Check if user has login status - else redirect to index.html
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

// Print the list of files in user directory
$files = scandir('./uploads/' . $_SESSION['id']);
sort($files);
foreach($files as $file){
  if ($file != "." && $file != ".." && $file != ".DS_Store") { // Exclude metadata files
     echo '<a href="./uploads/' . $_SESSION['id'] . '/' . $file . '">' . $file . '</a> <br>';

     // Did not work on unix build
     //echo "was last modified: " . date ("F d Y H:i:s.", filemtime($file)) . '<br>';
  }
}
?>
