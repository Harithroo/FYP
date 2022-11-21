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
    <div class="oinfraction_page">
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
                <div class="nlinks nactive">Infractions</div>
                <div class="nlinks"><a href="osearch.php">Search Driver</a></div>
            </div>
            <div class="right">
                <div class="nlinks"><a href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="container">
            <div class="side_nav">
                <br>
                <div class="slinks sactive">Over Due Infractions</div>
                <div class="slinks"><a href="oinfractionspending.php">Pending Infractions</a></div>
                <div class="slinks"><a href="oinfractionspaid.php">Paid Infractions</a></div>
                <div class="button"><button class="oprint" onclick="Export('oinfractionsod')">Print List</button></div>
            </div>
            <div class="content">
                <?php
                    echo $oinfractionsod;
                ?>
                <!-- <div class="record">
                    <div class="recordl">
                        <div>Status : Over Due</div>
                        <div>Amount : 1000/= LKR</div>
                        <div>Due : 20/08/2022</div>
                    </div>
                    <div class="recordl">
                        <div>Vehicle No : WP KM-2436</div>
                        <div>View Report</div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    
</body>
<footer class="footer">
    
</footer>
    <script>
        function Export(oinfractionsod)
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("export.php?table="+oinfractionsod+"", '_blank');
            }
        }
    </script>
</html>