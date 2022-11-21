<?php
session_start();
include("db.php");
if (empty($_POST['number']) || empty($_POST['upassword'])) {
    header("location:ologin.php");
}else{
    $ono=$_POST['number'];
    $pass=$_POST['upassword'];

    $SQLono="SELECT * FROM officers WHERE number LIKE '$ono'";
    $exeSQLono=mysqli_query($conn, $SQLono) or die (mysqli_error($conn));
    $arrayono=mysqli_fetch_array($exeSQLono);

    // $SQLvno="SELECT * FROM vehicles WHERE number LIKE '$vno'";
    // $exeSQLvno=mysqli_query($conn, $SQLvno) or die (mysqli_error($conn));
    // $arrayvno=mysqli_fetch_array($exeSQLvno);

    if ($arrayono != null) {
        if ($ono==$arrayono['number'] && $pass==$arrayono['password']) {     
            $_SESSION['officer']=$ono;

            // echo "<script>alert('match, in database')</script>";
            // echo "<a href='signup.php'>back</a><br>";
            // echo $vno,"/",$arrayvno['number'],"/",$ono,"/",$arrayono['ono'];
            
            // echo $vno,"/",$arrayvno['number'],"/",$arrayvno['brand'],"/",$arrayvno['model'],"/",$arrayvno['color']
            // ,"/",$ono,"/",$arrayono['ono'],"/",$arrayono['licence number'],"/",$arrayono['name'],"/",$arrayono['address'];
            
            // $_SESSION['owner'][$ono]=$arrayono['name'];
            // $_SESSION['owner'][$arrayono['licence number']]=$arrayono['address'];
            // $_SESSION['vehicle'][$vno]=$arrayvno['color'];
            // $_SESSION['vehicle'][$arrayvno['brand']]=$arrayvno['model'];

            header('Location: oinfractionsod.php');
            exit;
        }
    }else{
        header("location:ologin.php?msg=check");
    }
}
