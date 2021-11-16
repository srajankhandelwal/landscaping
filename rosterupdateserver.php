<?php
    require_once('db.php');
    $wrong = 0;
    if(isset($_POST['date'])) {
        $gid = $_POST['gid'];
        $area = $_POST['area'];
        $date = $_POST['date'];

        echo "<br/> $gid $area $date <br/>";

        // checking if entry exists
        // $sql = "SELECT count(*) FROM roster WHERE date = '$date' and area = '$area'";
        // $result = mysqli_query($db, $sql);
        // $row = mysqli_fetch_assoc($result);
        // echo $result;
        // // echo $row['count(*)'];
        // if($row['count(*)'] === 0) {
        //     echo "row inserted <br\>";
        //     $sql = "insert into roster('date','area','gid') values ('$date','$area','$gid')";
        //     $result = mysqli_query($db, $sql);
        //     echo " status : " + $result + "<br/>";
        // }
        // else{
        //     echo "row updated <br\>";
        //     $sql = "update roster set gid = $gid where date = $date and area = $area";;
        //     $result = mysqli_query($db, $sql);
        //     echo " status : " + $result + "<br/>";
        // }






        $sql = "SELECT * FROM roster WHERE date = '$date' and area = '$area'";
        echo "<br/> hi";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $cnt = mysqli_num_rows($result);
        echo "<br/> $cnt";
        if($cnt === 0) {
            echo $cnt;
            echo "row inserted <br\>";
            $sql = "insert into roster(date,area,gid) values ('$date','$area','$gid')";
            $result = mysqli_query($db, $sql);
            echo " status : $result <br/>";
        }
        else{
            echo $cnt;
            echo "row updated <br\>";
            $sql = "update roster set gid = '$gid' where date = '$date' and area = '$area'";;
            $result = mysqli_query($db, $sql);
            echo " status : $result <br/>";
        }
    }

?>
