<?php
session_start();
// Database Connection
include("db.php");
$duedays = "14 days";
if (isset($_GET['table'])) {
    $rows = array();
    if ($_GET['table'] == "oinfractionsod"){
        $SQLvnoin = "SELECT * FROM infractions";
        $exeSQLvnoin = mysqli_query($conn, $SQLvnoin) or die(mysqli_error($conn));

        while ($arrayvnoin = mysqli_fetch_assoc($exeSQLvnoin)) {
            if ($arrayvnoin != null) {
                $pattern = "/[-\s:]/";
                $timearray = preg_split($pattern, $arrayvnoin['time']);
                $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
                $due = date('d-m-Y', strtotime($date . ' + ' . $duedays));
                $today= date("d-m-Y");
                if (strtotime($due)<=strtotime($today)) {
                    $rows[] = $arrayvnoin;
                }
            }
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=infractions.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('No', 'Number', 'Speed', 'Time', 'Location'));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                fputcsv($output, $row);
            }
        }
    }

    if ($_GET['table'] == "oinfractionspending"){
        $SQLvnoin = "SELECT * FROM infractions";
        $exeSQLvnoin = mysqli_query($conn, $SQLvnoin) or die(mysqli_error($conn));

        while ($arrayvnoin = mysqli_fetch_assoc($exeSQLvnoin)) {
            if ($arrayvnoin != null) {
                $pattern = "/[-\s:]/";
                $timearray = preg_split($pattern, $arrayvnoin['time']);
                $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
                $due = date('d-m-Y', strtotime($date . ' + ' . $duedays));
                $today= date("d-m-Y");
                if (strtotime($due)>=strtotime($today)) {
                    $rows[] = $arrayvnoin;
                }
            }
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=infractions.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('No', 'Number', 'Speed', 'Time', 'Location'));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                fputcsv($output, $row);
            }
        }
    }

    if ($_GET['table'] == "oinfractionspaid"){
        $SQLvnop = "SELECT * FROM paid";
        $exeSQLvnop = mysqli_query($conn, $SQLvnop) or die(mysqli_error($conn));

        while ($arrayvnop = mysqli_fetch_assoc($exeSQLvnop)) {
            if ($arrayvnop != null) {
                $rows[] = $arrayvnop;
            }
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=infractions.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('No', 'Number', 'Speed', 'Time', 'Location'));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                fputcsv($output, $row);
            }
        }
    }


    if ($_GET['table'] == "dinfractionspending"){
        $vno = $_SESSION['vehicle'];
        $SQLvnoin = "SELECT * FROM infractions where number like '$vno'";
        $exeSQLvnoin = mysqli_query($conn, $SQLvnoin) or die(mysqli_error($conn));

        while ($arrayvnoin = mysqli_fetch_assoc($exeSQLvnoin)) {
            if ($arrayvnoin != null) {
                $pattern = "/[-\s:]/";
                $timearray = preg_split($pattern, $arrayvnoin['time']);
                $date = $timearray[2] . "-" . $timearray[1] . "-" . $timearray[0];
                $due = date('d-m-Y', strtotime($date . ' + ' . $duedays));
                $today= date("d-m-Y");
                if (strtotime($due)<=strtotime($today)) {
                    $rows[] = $arrayvnoin;
                }
            }
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=infractions.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('No', 'Number', 'Speed', 'Time', 'Location'));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                fputcsv($output, $row);
            }
        }
    }
    if ($_GET['table'] == "dinfractionspaid"){
        $vno = $_SESSION['vehicle'];
        $SQLvnop = "SELECT * FROM paid where number like '$vno'";
        $exeSQLvnop = mysqli_query($conn, $SQLvnop) or die(mysqli_error($conn));

        while ($arrayvnop = mysqli_fetch_assoc($exeSQLvnop)) {
            if ($arrayvnop != null) {
                $rows[] = $arrayvnop;
            }
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=infractions.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('No', 'Number', 'Speed', 'Time', 'Location'));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                fputcsv($output, $row);
            }
        }
    }
}

?>