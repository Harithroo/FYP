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
    <div class="ologin_page">
        <h1 class="welcome">Welcome</h1>
        <div class="login_fields">
            <form action=ologin_process.php method=post style="width: 0px;">
                <input type="text" name="number" id="number" placeholder="Number" required>
                <br>
                <input type="password" name="upassword" id="upassword" placeholder="Password" required>
                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'check') {
                    echo "<br><br><div class='popup'>check number and password, try again</div>";
                }
                ?>
                <br>
                <div class="loginbuttons">
                    <!-- <input type=reset value='Clear form' id="button" name ='Clear form'> -->
                    <input type=submit value='log in' id="button" name='log in'>
                </div>
            </form>
        </div>
    </div>
</body>
<footer>

</footer>
</html>