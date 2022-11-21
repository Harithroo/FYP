<?php
include("dprocess.php"); // db.php included in dprocess.php
if (isset($_POST['email'])) {
    if (isset($_SESSION['user']) && isset($_SESSION['vehicle'])) {
        $nic = $_SESSION['user'];
        $vno = $_SESSION['vehicle'];
        $email=$_POST['email'];
        $SQLemail = "INSERT INTO emails (email,number,nic)
        VALUES ('".$email."','".$vno."','".$nic."')";
        // $SQLnoin = "DELETE FROM infractions WHERE no = '$no'";
        if (mysqli_query($conn, $SQLemail)) {
            header('Location: dmessages.php');
        }
    }
}
if (isset($_POST['remail'])) {
    $remail=$_POST['remail'];
    $SQLremail = "DELETE FROM emails WHERE email = '$remail'";
    if (mysqli_query($conn, $SQLremail)) {
        header('Location: dmessages.php');
    }
}
$SQLemails = "SELECT * FROM emails WHERE number LIKE '$vno' AND nic LIKE '$nic'";
$exeSQLemails = mysqli_query($conn, $SQLemails) or die(mysqli_error($conn));
$emails= "";
if ($exeSQLemails != null) {
    while ($arrayemail = mysqli_fetch_array($exeSQLemails)) {
        if ($arrayemail != null) {
            if ($vno == $arrayemail['number']) {
                $emails = $emails . "
                <div class='record'>
                    ".$arrayemail['email']."
                    <form action='demail.php' method='post'>
                        <input type='submit' value='Remove' id='remove'>
                        <input type='hidden' name='remail' value=".$arrayemail['email'].">
                    </form>
                </div>";
            }
        }
    }if ($emails==""){
        $emails = $emails . "
        <div class='record'>
            no email added
        </div>";
    }
}
?>