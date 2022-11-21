<?php
include("dprocess.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infractions/pending</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>

<body>
    <div class="dinfraction_page">
        <div class="header">
            <div><img src="profile.png" alt="profile"></div>
            <div class="header_container">
                <div>
                    <div> <?php echo $name ?> </div>
                    <div> <?php echo $nic ?> </div>
                </div>
                <div>
                    <div> <?php echo $modle ?> </div>
                    <div> <?php echo $vno ?> </div>
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="left">
                <div class="nlinks nactive">Infractions</div>
            </div>
            <div class="right">
                <div class="nlinks"><a href="dmessages.php">Messages</a></div>
                <div class="nlinks"><a href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="container">
            <div class="side_nav">
                <br>
                <div class="slinks sactive">Pending Infractions</div>
                <div class="slinks"><a href="dinfractionspaid.php">Paid Infractions</a></div>
                <div class="button"><button class="print" onclick="Export('dinfractionspending')">Print List</button></div>
            </div>
            <div class="content">
                <?php
                echo $infractions;
                ?>
                <!-- <div class="record">
                    <div class="recordl">
                        <div>Status : Pending</div>
                        <div>Due : 20/08/2022</div>
                    </div>
                    <div class="recordl">
                        <div>Amount : 2000/= LKR</div>
                        <div>View Report</div>
                        <div>Pay Fine</div>
                    </div>
                </div>
                <div class="record">
                    <div class="recordl">
                        <div>Status : Pending</div>
                        <div>Due : 20/08/2022</div>
                    </div>
                    <div class="recordl">
                        <div>Amount : 3000/= LKR</div>
                        <div>View Report</div>
                        <div>Pay Fine</div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</body>
<footer class="footer">

</footer>
    <script>
        function Export(dinfractionspending)
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("export.php?table="+dinfractionspending+"");
            }
        }
    </script>

</html>