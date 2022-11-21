<?php
include("oprocess.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>

<body>
    <div class="osearch_page">
        <div class="header">
            <div><img src="profile.png" alt="profile"></div>
            <div class="header_container">
                <div>
                    <div> <?php echo $name ?> </div>
                    <div> <?php echo $nic ?> </div>
                </div>
                <div>
                    <div> <?php echo $ono ?> </div>
                    <div> <br> </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="left">
                <div class="nlinks"><a href="oinfractionsod.php">Infractions</a></div>
                <div class="nlinks nactive">Search Driver</div>
            </div>
            <div class="right">
                <div class="nlinks"><a href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="topbar">
            <form method="post" action="osearch.php">
                <div class="ssearch">Enter name or NIC <input type="text" name="searchn" placeholder="name or nic"></div>
                <div class="ssearch">Enter vehicle licence Number <input type="text" name="searchv" placeholder="ABC1234"></div>
                <div class="button"><input type="submit" value="Search" /></div>
            </form>
        </div>
        <div class="container">
            <div class="side_nav">
                <?php 
                    if (isset($search)){
                        echo $search;
                    }
                ?>
            </div>
            <div class="content">
                <?php 
                    if (isset($vehicles)){
                        echo $vehicles;
                    }
                ?>
                <?php 
                    if (isset($infractions)){
                        echo $infractions;
                    }
                ?>
            </div>
        </div>
    </div>

</body>
<footer class="footer">

</footer>

</html>