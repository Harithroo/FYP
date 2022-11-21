<?php
include("db.php");
if (isset($_GET['no']) && isset($_GET['stat'])) {
    $no=$_GET['no'];
    $stat=$_GET['stat'];
    $SQLnoinp = "INSERT INTO paid (no,number,speed,time,location,image_path)
    SELECT no,number,speed,time,location,image_path FROM infractions WHERE no = '$no'";
    $SQLnoin = "DELETE FROM infractions WHERE no = '$no'";
    if (mysqli_query($conn, $SQLnoinp) && mysqli_query($conn, $SQLnoin)) {
        header('Location: dreport.php?no=' . $no . '&stat=paidnow');
    }
}
?>