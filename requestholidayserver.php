<?php
    
    include('db.php');

    $gid = $_POST['gardenerid'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $sql = "insert into holidayrequest values('$gid', '$startdate', '$enddate','pending')";

    $result = mysqli_query($db,$sql);

    if($result){
        echo "Holiday request sent";
    }else{
        echo mysqli_error($db);
    }



?>