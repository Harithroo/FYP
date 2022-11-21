<?php
session_start();
include("db.php");
if (empty($_POST['name']) || empty($_POST['ono']) || empty($_POST['pass'])) {
    header("location:oregister.php");
}else{
    $nic=$_POST['name'];
    $vno=$_POST['ono'];
    $vno=$_POST['vno'];

    $SQLnic="SELECT * FROM owners WHERE nic LIKE '$nic'";
    $exeSQLnic=mysqli_query($conn, $SQLnic) or die (mysqli_error($conn));
    $arraynic=mysqli_fetch_array($exeSQLnic);

    $SQLvno="SELECT * FROM vehicles WHERE number LIKE '$vno'";
    $exeSQLvno=mysqli_query($conn, $SQLvno) or die (mysqli_error($conn));
    $arrayvno=mysqli_fetch_array($exeSQLvno);

    if ($arraynic != null) {
        if ($nic==$arraynic['nic']) {
            if ($arrayvno != null) {
                if ($vno==$arrayvno['number']) {
                    
                    $_SESSION['user']=$nic;
                    $_SESSION['vehicle']=$vno;

                    // echo "<script>alert('match, in database')</script>";
                    // echo "<a href='signup.php'>back</a><br>";
                    // echo $vno,"/",$arrayvno['number'],"/",$nic,"/",$arraynic['nic'];
                    
                    // echo $vno,"/",$arrayvno['number'],"/",$arrayvno['brand'],"/",$arrayvno['model'],"/",$arrayvno['color']
                    // ,"/",$nic,"/",$arraynic['nic'],"/",$arraynic['licence number'],"/",$arraynic['name'],"/",$arraynic['address'];
                    
                    // $_SESSION['owner'][$nic]=$arraynic['name'];
                    // $_SESSION['owner'][$arraynic['licence number']]=$arraynic['address'];
                    // $_SESSION['vehicle'][$vno]=$arrayvno['color'];
                    // $_SESSION['vehicle'][$arrayvno['brand']]=$arrayvno['model'];

                    header('Location: dinfractionspending.php');
                    exit;
                }
            }else{
                header("location:dlogin.php?msg=vno");
            }
        }
    }else{
        header("location:dlogin.php?msg=nic");
    }
}
