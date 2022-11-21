<?php
session_start();
include("db.php");
$duedays = "14 days";
$amount = "2500";
if (isset($_SESSION['user']) && isset($_SESSION['vehicle'])) {
    $nic = $_SESSION['user'];
    $vno = $_SESSION['vehicle'];

    $SQLnic = "SELECT * FROM owners WHERE nic LIKE '$nic'";
    $exeSQLnic = mysqli_query($conn, $SQLnic) or die(mysqli_error($conn));
    $arraynic = mysqli_fetch_array($exeSQLnic);

    $SQLvno = "SELECT * FROM vehicles WHERE number LIKE '$vno'";
    $exeSQLvno = mysqli_query($conn, $SQLvno) or die(mysqli_error($conn));
    $arrayvno = mysqli_fetch_array($exeSQLvno);

    $SQLvnoin = "SELECT * FROM infractions WHERE number LIKE '$vno'";
    $exeSQLvnoin = mysqli_query($conn, $SQLvnoin) or die(mysqli_error($conn));

    $SQLvnop = "SELECT * FROM paid WHERE number LIKE '$vno'";
    $exeSQLvnop = mysqli_query($conn, $SQLvnop) or die(mysqli_error($conn));

    $modle = $arrayvno['brand'] . " " . $arrayvno['model'];
    $name = $arraynic['name'];
    $infractions = "";

    while ($arrayvnoin = mysqli_fetch_array($exeSQLvnoin)) {
        if ($arrayvnoin != null) {
            $pattern = "/[-\s:]/";
            $timearray = preg_split($pattern, $arrayvnoin['time']);
            $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
            $due = date('d/m/Y', strtotime($date . ' + ' . $duedays));
            if ($vno == $arrayvnoin['number']) {
                $infractions = $infractions . "
                <div class='record'>
                    <div class='recordl'>
                        <div>Status : Pending</div>
                        <div>Due : " . $due . "</div>
                    </div>
                    <div class='recordl'>
                        <div>Amount : " . $amount . "/= LKR</div>
                        <div><a href='dreport.php?no=" . $arrayvnoin['no'] . "&stat=pending'>View Report</a></div>
                    </div>
                </div>";
            }
        }
    }
    $infractionspaid = "";
    while ($arrayvnop = mysqli_fetch_array($exeSQLvnop)) {
        if ($arrayvnop != null) {
            $pattern = "/[-\s:]/";
            $timearray = preg_split($pattern, $arrayvnop['time']);
            $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
            $due = date('d/m/Y', strtotime($date . ' + ' . $duedays));
            if ($vno == $arrayvnop['number']) {
                $infractionspaid = $infractionspaid . "
                <div class='record'>
                    <div class='recordl'>
                        <div>Status : Pending</div>
                        <div>Due : " . $due . "</div>
                    </div>
                    <div class='recordl'>
                        <div>Amount : " . $amount . "/= LKR</div>
                        <div><a href='dreport.php?no=" . $arrayvnop['no'] . "&stat=paid'>View Report</a></div>
                    </div>
                </div>";
            }
        }
    }
    
    if (isset($_GET['no'])){
        $no=$_GET['no'];
        $stat=$_GET['stat'];
        if ($stat=="paid" || $stat=="paidnow"){
            $SQLnoin = "SELECT * FROM paid WHERE no = '$no'";
            $stat=="paid";
        }else{
            $SQLnoin = "SELECT * FROM infractions WHERE no = '$no'";
        }
        $exeSQLnoin = mysqli_query($conn, $SQLnoin) or die(mysqli_error($conn));
        $arraynoin = mysqli_fetch_array($exeSQLnoin);
        $no=$arraynoin['no'];
        $number=$arraynoin['number'];
        $speed=$arraynoin['speed'];
        $time=$arraynoin['time'];
        $location=$arraynoin['location'];
        $image_path=$arraynoin['image_path'];

        $SQLinv = "SELECT * FROM vehicles WHERE number = '$number'";
        $exeSQLinv = mysqli_query($conn, $SQLinv) or die(mysqli_error($conn));
        $arrayinv = mysqli_fetch_array($exeSQLinv);
        $number=$arrayinv['number'];
        $nico=$arrayinv['nic'];
        $brand=$arrayinv['brand'];
        $model=$arrayinv['model'];
        $color=$arrayinv['color'];
        
        $SQLind = "SELECT * FROM owners WHERE nic = '$nico'";
        $exeSQLind = mysqli_query($conn, $SQLind) or die(mysqli_error($conn));
        $arrayind = mysqli_fetch_array($exeSQLind);
        $nico=$arrayind['nic'];
        $licence_number=$arrayind['licence number'];
        $nameo=$arrayind['name'];
        $address=$arrayind['address'];
        
    }
} else {
    header('Location: index.html');
    exit;
}
