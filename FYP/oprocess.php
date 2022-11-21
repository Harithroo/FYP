<?php
session_start();
include("db.php");
$duedays = "14 days";
$amount = "2500";
if (isset($_SESSION['officer'])) {
    $ono = $_SESSION['officer'];

    $SQLono = "SELECT * FROM officers WHERE number LIKE '$ono'";
    $exeSQLono = mysqli_query($conn, $SQLono) or die(mysqli_error($conn));
    $arrayono = mysqli_fetch_array($exeSQLono);

        // $SQLdno = "SELECT * FROM owners";
        // $exeSQLdno = mysqli_query($conn, $SQLdno) or die(mysqli_error($conn));
        // $arraydno = mysqli_fetch_array($exeSQLdno);

        // $SQLvno = "SELECT * FROM vehicles";
        // $exeSQLvno = mysqli_query($conn, $SQLvno) or die(mysqli_error($conn));
        // $arrayvno = mysqli_fetch_array($exeSQLvno);

    $SQLvnoin = "SELECT * FROM infractions";
    $exeSQLvnoin = mysqli_query($conn, $SQLvnoin) or die(mysqli_error($conn));

    $SQLvnop = "SELECT * FROM paid";
    $exeSQLvnop = mysqli_query($conn, $SQLvnop) or die(mysqli_error($conn));

    $name = $arrayono['name'];
    $ono = $arrayono['number'];
    $nic = $arrayono['nic'];
    $oinfractionsod = "";
    $oinfractionspending = "";
    
    while ($arrayvnoin = mysqli_fetch_array($exeSQLvnoin)) {
        if ($arrayvnoin != null) {
            $pattern = "/[-\s:]/";
            $timearray = preg_split($pattern, $arrayvnoin['time']);
            $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
            $due = date('d-m-Y', strtotime($date . ' + ' . $duedays));
            $today= date("d-m-Y");
            if (strtotime($due)<strtotime($today)) {
                $oinfractionsod = $oinfractionsod . "
                <div class='record'>
                    <div class='recordl'>
                        <div>Status : Over Due</div>
                        <div>Amount : " . $amount . "/= LKR</div>
                        <div>Due : " . $due . "</div>
                    </div>
                    <div class='recordl'>
                        <div>Vehicle No : ".$arrayvnoin['number']."</div>
                        <div><a href='oreport.php?no=" . $arrayvnoin['no'] . "&stat=overdue'>View Report</a></div>
                    </div>
                </div>";
            }
            if (strtotime($due)>strtotime($today)) {
                $oinfractionspending = $oinfractionspending . "
                <div class='record'>
                    <div class='recordl'>
                        <div>Status : Pending</div>
                        <div>Amount : " . $amount . "/= LKR</div>
                        <div>Due : " . $due . "</div>
                    </div>
                    <div class='recordl'>
                        <div>Vehicle No : ".$arrayvnoin['number']."</div>
                        <div><a href='oreport.php?no=" . $arrayvnoin['no'] . "&stat=pending'>View Report</a></div>
                    </div>
                </div>";
            }
                
        }
    }
    $oinfractionspaid = "";
    while ($arrayvnop = mysqli_fetch_array($exeSQLvnop)) {
        if ($arrayvnop != null) {
            $pattern = "/[-\s:]/";
            $timearray = preg_split($pattern, $arrayvnop['time']);
            $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
            $due = date('d/m/Y', strtotime($date . ' + ' . $duedays));
            $oinfractionspaid = $oinfractionspaid . "
            <div class='record'>
                <div class='recordl'>
                    <div>Status : paid</div>
                    <div>Due : " . $due . "</div>
                </div>
                <div class='recordl'>
                    <div>Amount : " . $amount . "/= LKR</div>
                    <div>Vehicle No : ".$arrayvnop['number']."</div>
                    <div><a href='oreport.php?no=" . $arrayvnop['no'] . "&stat=paid'>View Report</a></div>
                </div>
            </div>";
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
    if (isset($_POST["searchn"])) {
        // (B1) SEARCH FOR USERS
        $SQLsearch = "SELECT * FROM `owners` WHERE `name` LIKE '".$_POST["searchn"]."' OR `nic` LIKE '".$_POST["searchn"]."'";
        $exeSQLsearch = mysqli_query($conn, $SQLsearch) or die(mysqli_error($conn));
        $results = $exeSQLsearch;
    
        if (isset($_POST["ajax"])) {
            echo json_encode($results);
        }
    
        // (B2) DISPLAY RESULTS
        
        while ($r = mysqli_fetch_assoc($results)) {
            if (count($r) > 0) {
                $search = "<div class='record'>NIC - " . $r["nic"] . " <br>Licence number - " . $r["licence number"] . " <br> Name - " . $r["name"] . " <br> Address - " . $r["address"] . "</div>";
                $SQLsearchv = "SELECT * FROM `vehicles` WHERE `nic` LIKE '".$r["nic"]."'";
                $exeSQLsearchv = mysqli_query($conn, $SQLsearchv) or die(mysqli_error($conn));
                $resultsv = $exeSQLsearchv;
                $vehicles = "";
                while ($v = mysqli_fetch_assoc($resultsv)) {
                    $vehicles = $vehicles . "
                    <div class='record'>
                        <div class='recordl'>
                            <div>Number : " . $v["number"] . "<br>color : " . $v["color"] . "</div>
                            <div>Brand : " . $v["brand"] . "<br>modle : " . $v["model"] . "</div>
                        </div>
                    </div>";
                }
            } else {
                $search = "No results found";
            }
        }
    }
    if (isset($_POST["searchv"])) {
        // (B1) SEARCH FOR USERS
        $SQLsearch = "SELECT * FROM `vehicles` WHERE `number` LIKE '".$_POST["searchv"]."'";
        $exeSQLsearch = mysqli_query($conn, $SQLsearch) or die(mysqli_error($conn));
        $results = $exeSQLsearch;
    
        if (isset($_POST["ajax"])) {
            echo json_encode($results);
        }
    
        // (B2) DISPLAY RESULTS
        
        while ($r = mysqli_fetch_assoc($results)) {
            if (count($r) > 0) {
                $search = "<div class='record'>" . $r["number"] . " - " . $r["brand"] . " - " . $r["model"] . " - " . $r["color"] . "</div>";
                $SQLsearchi = "SELECT * FROM vehicles INNER JOIN infractions ON vehicles.number = infractions.number WHERE vehicles.number LIKE '".$_POST["searchv"]."'";
                $exeSQLsearchi = mysqli_query($conn, $SQLsearchi) or die(mysqli_error($conn));
                $resultsi = $exeSQLsearchi;
                $infractions = "";
                while ($i = mysqli_fetch_assoc($resultsi)) {
                    if (count($i) > 0) {
                        $pattern = "/[-\s:]/";
                        $timearray = preg_split($pattern, $i['time']);
                        $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
                        $due = date('d/m/Y', strtotime($date . ' + ' . $duedays));
                        $infractions = $infractions . "
                        <div class='record'>
                            <div class='recordl'>
                                <div>Status : Pending</div>
                                <div>Due : " . $due . "</div>
                            </div>
                            <div class='recordl'>
                                <div>Amount : " . $amount . "/= LKR</div>
                                <div>Vehicle No : ".$i['number']."</div>
                                <div><a href='oreport.php?no=" . $i['no'] . "&stat=paid'>View Report</a></div>
                            </div>
                        </div>";
                    } else {
                        $infractions = "No infractions found";
                    }
                }
            } else {
                $search = "No results found";
            }
        }
    }
} else {
    header('Location: index.html');
    exit;
}
