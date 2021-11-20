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

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">User profile</a></li>
              <a href = "logout.php" class="ml-auto"> Logout </a>
            </ol>

          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card h">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if($row['gender']=="M"){ ?>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                  <?php }else{ ?>
                  <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Admin" class="rounded-circle" width="150">
                <?php } ?>
                    <div class="mt-3">
                      <h4><?php echo $row['username']; ?></h4>
                      <p class="text-secondary mb-1">Gardener ID</p>
                      <p class="text-muted font-size-sm"><?php echo $row['GardenerID']; ?></p>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['Name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['gender']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['Address']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['contactno']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['DoB']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Joining</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['DoJ']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Current area of work</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['workingarea']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="btn btn-info " href="userupdate_profile.php">Update</a>
                    </div>
                    <div class="col-sm-6">
                      <a class="btn btn-info "href="userupdate_password.php">Change Password</a>
                    </div>
                  </div>
                </div>
              </div>
              <h3>My Requests</h3>
              <div class="row gutters-sm">

                <?php
                $sql1 = "SELECT * from `request` where gardenerid = '$var1' and status = 0" ;
                $result1 = mysqli_query($db, $sql1);
                if(mysqli_num_rows($result1)==0){
                  ?>
                  <div class="col-sm-4 mb-3">
                  <h6>Hurray ! ALL Requests completed.</h6>
                </div>
                <?php } else {
                while($row1 = mysqli_fetch_assoc($result1)){
                  ?>
                  <div class="col-sm-4 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><?php echo $row1['areaname'];?></h6>
                        <form action ="userprofile.php" method ="POST">
                        <input type = "hidden" name  ="srid" value = "<?php echo $row1['srid'];?>"/>
                        <input type = "submit" name  ="completed" value = "Completed"/>
                      </form>
                      </div>
                    </div>
                  </div>
                  <?php
                }}
                ?>

                <!-- <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"> My Performance</h6>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>

              <h3>Request Equipment Repair</h3>
               <div>
               <table id = "users">
        <tr>
            <th>Equipment-ID</th>
        </tr>
        <tr>
            <td>
                <form action ="userprofile.php" method ="POST">
                    <input type= "text" name="equipmentid" placeholder="Enter Equipment ID"/>
                    <input type = "submit" name  ="request" value = "Request"/>
                </form>
            </td> 
        </tr>
        
      <?php
              
              ?>
    </table>
    <table>
      <tr>
        <th>Request-ID</th>
        <th>Equipment-ID</th>
        <th>Status</th>
      </tr>
      <?php
      $sql2 = "SELECT * from `equipmentrequest` where gardenerid = '$var1' order by status ASC" ;
      $result2= mysqli_query($db, $sql2);
      if(mysqli_num_rows($result2)==0){
        ?>
        <tr>
        <td>No Request Made</td>
        <td>Relax!</td>
        <td>Relax!</td>
      </tr>
      <?php } else {
      while($row2 = mysqli_fetch_assoc($result2)){
        ?>
        <tr>
        <td><?php echo $row2['erid'] ?></td>
        <td><?php echo $row2['equipmentid'] ?></td>
        <td><?php if($row2['status']==0) echo 'Request Pending';
        else if($row2['status']==1) echo 'Approved! Work in Progress';
        else if($row2['status']==2) echo 'Declined';
        else if($row2['status']==3) echo 'Repaired';
        ?></td>
      </tr>
      <?php }} ?>
    </table>

               </div>
            </div>
          </div>

        </div>
    </div>
  </body>
</html>
<?php

if(isset($_POST['completed'])){
    $srid = $_POST['srid'];

    $upd = "UPDATE request SET status = 1 WHERE srid = '$srid'";
    $upd_result = mysqli_query($db, $upd);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "userprofile.php"';
    echo '</script>';
}

?>

<?php

if(isset($_POST['request'])){
    $allot_equipmentid = $_POST['equipmentid'];
    $allot_check="SELECT * from equipmentrequest WHERE equipmentid=$allot_equipmentid and (status=0 or status=1)";
    $check_result= mysqli_query($db, $allot_check);
    $num_rows=mysqli_num_rows($check_result);
    if($num_rows){
      echo '<script type = "text/javascript">';
      echo 'alert("Request already exsits!");';
      echo 'window.location.href = "userprofile.php"';
      echo '</script>';
    }
    else{
    $allot_select = "INSERT into equipmentrequest(equipmentid,gardenerid) values ('$allot_equipmentid','$var1') ";
    $allot_result = mysqli_query($db, $allot_select);
    

    echo '<script type = "text/javascript">';
    echo 'alert("Request Generated!");';
    echo 'window.location.href = "userprofile.php"';
    echo '</script>';
    }
}

?>
