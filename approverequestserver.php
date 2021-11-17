<?php

include('db.php');

if(isset($_POST['accept'])) {
    $gid = $_POST['gid'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];

$sql = "UPDATE holidayrequest set isApproved='approved' where GardenerId='$gid' and StartDate='$sdate' and EndDate='$edate'";

$result = mysqli_query($db, $sql);

    if($result){
        echo "Approved";
    }
    else{
        echo mysqli_error($db);
    }
}else{
    $gid = $_POST['gid'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];

$sql = "UPDATE holidayrequest set isApproved='denied' where GardenerId='$gid' and StartDate='$sdate' and EndDate='$edate'";

$result = mysqli_query($db, $sql);

    if($result){
        echo "Denied";
    }
    else{
        echo mysqli_error($db);
    }
}

?>