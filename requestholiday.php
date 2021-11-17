<?php
    include('navbargardener.php');
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


<div class = "container">
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<div class = "header"> 
        <h2>
                Enter the Details
        </h2>
</div>

<form action = "requestholidayserver.php" method="post">



<div class="mb-3">
        <label for="GardenerID" class="form-label">
                GardenerID
        </label>
        <input type="text" name = "gardenerid" class="form-control" placeholder="Enter Gardener ID" required>
</div>
<div class="mb-3">
        <label for="StartDate" class="form-label">
                Start Date
        </label>
        <input type="date" name = "startdate" class="form-control" placeholder="enter date" required>
</div>

<div class="mb-3">
        <label for="StartDate" class="form-label">
               End Date
        </label>
        <input type="date" name = "enddate" class="form-control" placeholder="enter date" required>
</div>





<button type = "submit" class="btn btn-outline-primary" name = "gardenerdetailsubmit">
        Request holiday
</button>

</form>

 
</body>
</div>

</html>