<?php
session_start();
if(!isset($_SESSION['GardenerID'])) {
    header("Location: gardenerlogin.php");
    exit();
}
require('db.php');
$var1 = $_SESSION['GardenerID'];
$sql = "SELECT * from `gardener` where gardenerid= '$var1'" ;
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);
?>
<?php
$var1 = $_SESSION['GardenerID'];
if (isset($_REQUEST['submit'])) {
  $name = $_REQUEST['name'];
  $gender = $_REQUEST['gender'];
  $dob = $_REQUEST['dob'];
  $contactno = $_REQUEST['contactno'];
  $address = $_REQUEST['address'];
  $doj = $_REQUEST['doj'];

    $query    = "Update `gardener` SET Name = '$name', gender = '$gender', Address='$address',contactno = '$contactno', dob='$dob', doj = '$doj' WHERE GardenerID='$var1'";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_assoc($result);
    echo '<script type = "text/javascript">';
    echo 'alert("Changes Updated!");';
    echo 'window.location.href = "userprofile.php"';
    echo '</script>';


}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
		<div class="main-body">
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Update Profile</a></li>
          <a href = "userprofile.php" class="ml-auto"> Back </a>
        </ol>
      </nav>
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
                <?php if($row['gender']=='M'): ?>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <?php else: ?>
              <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Admin" class="rounded-circle" width="150">
            <?php endif; ?>
                <div class="mt-3">
                  <h4><?php echo $row['username']; ?></h4>
                  <p class="text-secondary mb-1">Gardener ID</p>
                  <p class="text-muted font-size-sm"><?php echo $row['GardenerID']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
              <form>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="name" class="form-control" value="<?php echo trim($row['Name']);?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gender</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="gender" class="form-control" value="<?php echo $row['gender'];?>">
								</div>
							</div>
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="address" class="form-control" value="<?php echo $row['Address'];?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="contactno"  class="form-control" value="<?php echo $row['contactno'];?> ">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date Of Birth</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" name="dob" class="form-control" value=<?php echo $row['DoB'];?>>
								</div>
							</div>
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date Of Joining</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" name="doj" class="form-control" value=<?php echo $row['DoJ'];?>>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
            </form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
  </body>
</html>
