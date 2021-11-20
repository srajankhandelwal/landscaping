<?php
require_once('db.php');
if(!isset($_SESSION['username'])){
        header("Location: adminlogin.php" );
}
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

<?php 
        $area = null;
        if(isset($_POST['area'])){
                $area = $_POST['area'];
        }
?>

<div class="center">
    <h1>Gardeners</h1>
    <form action = "admin_gardenerlist.php" method = "POST">
        <br/><h5>Area Filter :</h5>
        <input type = "text" name = 'area' value = <?php echo "{$area}";?>>
        <input type = "submit" name = 'areasubmit'>
    </form>
    <table id = "gardeners" >


        <tr>
            <th>Gardener ID</th>
            <th>Name</th>
            <th>DoB</th>
            <th>Address</th>
            <th>contactno</th>
            <th>gender</th>
            <th>username</th>
            <th>DoJ</th>
            
        </tr>

        <?php
            $sql = "SELECT * FROM gardener";
            $sql2 = null;
            if(isset($area) and $area !== ''){
                $today = date("Y-m-d");
                $sql = "select * from gardener where GardenerID in ";
                $sql .= "(select GardenerID from roster where date = '$today' and area = '$area');";
                $sql2 = "select GardenerID from roster where date = '$today' and area = '$area'";
            }
        //     $sql = "SELECT * FROM gardener";

                // echo "\n {$sql} \n";
            $result = mysqli_query($db, $sql);
            if(isset($sql2)){
                $result2 = mysqli_query($db, $sql2);
                $row = mysqli_fetch_assoc($result2);
                // echo "\n res GardenerID = \n";
                // echo $row['GardenerID']." \n";
            }

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['GardenerID']; $_SESSION['GardenerID'] = $row['GardenerID']?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['DoB'];?></td>
            <td><?php echo $row['Address'];?></td>
            <td><?php echo $row['contactno'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['DoJ'];?></td>

            <!-- <td>
                <form action ="userprofile.php" method ="POST">
                    <input type="hidden" name='GardenerID' value=<?php echo $row['GardenerID'];?>>
                    <input type = "submit" name ="accept" value = "Go"/>
                </form>
            </td> -->
        </tr>
        <?php
                }
                ?>
    </table>


</div>



