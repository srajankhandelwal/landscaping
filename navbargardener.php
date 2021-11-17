<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gardener</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php

  echo "Hello" . $_SESSION['username'];
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Welcome, John</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="adminhome.php">Home</a></li>
      <li><a href="#">How to Reach IIT Patna</a></li>
      <li><a href="gardenerprofile.php">My Profile</a></li>
      <li><a href="gardenerprofile.php">View Duty Roster</a></li>
      <li><a href="requestholiday.php">Request Holiday</a></li>
      <li><a href="https://www.iitp.ac.in/saifiitp/index.php/contact-us">Contact Us</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Bhai aaja kaam krle thoda</h3>
</div>

</body>
</html>
