<?php
clearstatcache();
session_start();
$target_dir = 'uploads/' . $_SESSION['id'] . '/';
$uploadOk = 1;
$rand = rand();

$target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if target file is a file
if (!isset($_FILES['upload_file']) || $_FILES['upload_file']['error'] == UPLOAD_ERR_NO_FILE) {
  echo 'Sorry, your upload file was not found. <br>';
} else {
  // Check if file already exists - otherwise rename with random int
  if (file_exists($target_file)) {
      rename($target_file, $target_dir . $rand . basename($target_file, "$imageFileType") . $imageFileType);
      echo 'File name already exist. ';
      echo 'Your file has been renamed to ' . $rand . basename($target_file, "$imageFileType") . '<br>';
  }

  // Check file size
  if ($_FILES["upload_file"]["size"] >= 500000) {
      echo 'Sorry, your file is too large. <br>';
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo 'Sorry, your file was not uploaded. <br>';
  // Otherwise upload file
  } else {
      if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
          echo 'The file has been uploaded. <br>';
      } else {
          echo 'Sorry, there was an error uploading your file. <br>';
      }
  }
}
?>

<form action="home.php" method="post">
  <div class="container">
    <button type="submit">Back</button>
  </div>
</form>
