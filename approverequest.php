<?php
require('db.php');
$id;
$sdate;
$edate;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type ="text/css" href = "main.css">
    <title>Admin Charges</title>
</head>
<body>



<div class="center">
    <h1>Holiday Requests</h1>

    <table id = "users">
        <tr>
            <th>Gardener ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            
        </tr>

        <?php
            $sql = "SELECT * FROM holidayrequest where isApproved='pending'";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['GardenerID'];?></td>
            <td><?php echo $row['StartDate'];?></td>
            <td><?php echo $row['EndDate'];?></td>
            <td>
                <form action ="approverequestserver.php" method ="POST">
                    <input type="hidden" name='gid' value=<?php echo $row['GardenerID'];?>>
                    <input type="hidden" name='sdate' value=<?php echo $row['StartDate'];?>>
                    <input type="hidden" name='edate' value=<?php echo $row['EndDate'];?>>
                    <input type = "submit" name ="accept" value = "Approve"/>
                    <input type = "submit" name ="decline" value = "Decline"/> 
                </form>
            </td>
        </tr>
        <?php
                }
                ?>
    </table>


</div>



