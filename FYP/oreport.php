<?php
include("oprocess.php");
$no=$_GET['no'];
$stat=$_GET['stat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- jquery for payment function -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
	<!-- payment gateway -->
	<script src="https://checkout.stripe.com/checkout.js"></script>

    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
</head>
<body>
    <div class="dpay_page">
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
                <div class="nlinks"><a href="osearch.php">Search Driver</a></div>
            </div>
            <div class="right">
                <div class="nlinks"><a href="logout.php">Logout</a></div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <div class="topbar">
                    <div>Status : <?php echo $stat; ?> </div>
                    <div class="buttons">
                        <div class="button"><button class="print">Print</button></div>
                    </div>
                </div>
                <div class="report">
                    <div class="left">
                        <div class="rimage">
                            <img src="<?php echo $image_path; ?>" alt="">
                        </div>
                        <div>
                            <div class='record'>
                            <div >location - <?php echo $location; ?></div>
                            <div >Speed - <?php echo $speed; ?></div>
                            <div >time - <?php echo $time; ?></div>
                            <div class="amount">
                                <div>
                                    Amount : <?php echo $amount ?>/= LKR
                                    <input type= "hidden" name="amount" id="amount" value="<?php echo $amount ?>/= LKR">
                                </div>
                                <?php
                                if ($stat=="overdue"){
                                ?>
                                <div class="button">
                                    <button class="pay">Over due</button>
                                </div>
                                <?php
                                }if ($stat=="pending"){
                                ?>
                                <div class="button">
                                    <button class="pay" id="pay-button">Pay Fine</button>
                                </div>
                                <?php
                                }if ($stat=="paid"){
                                ?>
                                <div class="button">
                                    <button class="pay">Paid</button>
                                </div>
                                <?php
                                }if ($stat=="paidnow"){ //returning after paing fine
                                ?>
                                <div class="button">
                                    <button class="pay">Paid</button>
                                </div>
                                <div align="center" id="thankyouPayment">Your Fine has been paid.<br><a href='dinfractionspending.php'><button id='closebtn'>OK</button></a></div>
                                <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div>
                            Details
                            <div>
                                vehicle details<br>
                                <div class='record'>
                                number - <?php echo $number; ?><br>
                                color - <?php echo $color; ?><br>
                                brand - <?php echo $brand; ?><br>
                                model - <?php echo $model; ?><br>
                                </div>
                            </div>
                            <br>
                            <div>
                                owner details<br>
                                <div class='record'>
                                nic - <?php echo $nico; ?><br>
                                licence number - <?php echo $licence_number; ?><br>
                                name - <?php echo $nameo; ?><br>
                                address - <?php echo $address; ?><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
<footer class="footer">
    
</footer>
</html>