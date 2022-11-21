<?php
include("demail.php"); // dprocess.php included in demail.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>
<body>
    <div class="dmessage_page">
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
                <div class="nlinks"><a href="dinfractionspending.php">Infractions</a></div>
            </div>
            <div class="right">
                <div class="nlinks nactive">Messages</div>
                <div class="nlinks"><a href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="container">
            <div class="side_nav">
                <br>
                <div>
                    <form action="demail.php" method="post">
                    <div>submit email to get email notifications</div>
                        <div><input type="email" name="email" id="email" required></div>
                        <div><input type="submit" value="submit"></div>
                    </form>
                    <div class="emails">
                        <div class="title">list of emails added</div>
                        <?php 
                            echo $emails;
                        ?>
                    </div>
                </div>
            </div>
            <div class="content">
                <?php
                echo $infractions;
                ?>
                
            </div>
        </div>
    </div>
    
</body>
<footer class="footer">
    
</footer>
</html>