<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Approval</title>
</head>
<style media="screen">

#users {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  text-align: center;
}
</style>
<body>

  <div class="center">
      <h1>Gardener Status</h1>

      <table id = "users">
          <tr>
              <th>Gardener-ID</th>
              <th>Currenet Working Area</th>
          </tr>

          <?php
              $gardener_query = "SELECT * FROM dutyroaster WHERE date = current_date";
              $gardener_result = mysqli_query($db, $gardener_query);

              while($gardener_row = mysqli_fetch_assoc($gardener_result)){
          ?>
          <tr>
              <td><?php echo $gardener_row['GardenerID'];?></td>
              <td><?php echo $gardener_row['areaname'];?></td>
          </tr>
          <?php
                  }
                  ?>
      </table>


  </div>

<div class="center">
    <h1>Grass Cutting Requests</h1>

    <table id = "users">
        <tr>
            <th>Request-ID</th>
            <th>Area of request</th>
            <th>Gardener-ID</th>
            <th>status</th>
            <th>Action</th>
        </tr>

        <?php
            $request_query = "SELECT * FROM request ORDER BY status ASC";
            $request_result = mysqli_query($db, $request_query);

            while($request_row = mysqli_fetch_assoc($request_result)){
        ?>
        <tr>
            <td><?php echo $request_row['srid'];?></td>
            <td><?php echo $request_row['areaname'];?></td>
            <td><?php if($request_row['gardenerid']==NULL) echo 'Not Assigned'; else echo $request_row['gardenerid'];?></td>
            <td><?php if($request_row['status']==0) echo 'Pending'; else echo 'Completed';?></td>
            <?php if($request_row['gardenerid']==NULL){ ?>

            <td>
                <form action ="admin_grasscuttingrequest.php" method ="POST">
                    <input type = "hidden" name  ="srid" value = "<?php echo $request_row['srid'];?>"/>
                    <input type= "text" name="gardenerid" placeholder="Enter gardenerid"/>
                    <input type = "submit" name  ="allot" value = "Allot"/>
                </form>
            </td>
          <?php }else{?>
            <td>Work alloted</td>
        </tr>
      <?php }?>
      <?php
              }
              ?>
    </table>


</div>

<?php

if(isset($_POST['allot'])){
    $srid = $_POST['srid'];
    $allot_gardenerid = $_POST['gardenerid'];
    $allot_select = "UPDATE request SET  gardenerid='$allot_gardenerid' WHERE srid = '$srid'";
    $allot_result = mysqli_query($db, $allot_select);

    echo '<script type = "text/javascript">';
    echo 'alert("gardener alloted!");';
    echo 'window.location.href = "admin_grasscuttingrequest.php"';
    echo '</script>';
}

?>
