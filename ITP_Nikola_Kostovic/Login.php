<?php
session_start();

if(isset($_SESSION['ulogovani_korisnik']) && isset($_COOKIE['korisnik_uloga']))
{
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="style/Login-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - evidencija projekata</title>
</head>


<body style="background-color: snow">
        <?php

            include "./Navbar.php";

        if(isset($_COOKIE['notice'])){
            echo "<div class='notice'>".$_COOKIE['notice']."</div>";
            setcookie("notice", "", time()-1000);
        }
        if(isset($_COOKIE['notice_reg'])){
            echo "<div style='background-color: limegreen; border: solid  limegreen 1px;' class='notice'>".$_COOKIE['notice_reg']."</div>";
            setcookie("notice_reg", "", time()-1000);
        }
        ?>

    <div class="login-div">
        <div >
            <img style="width: 100%" src="img/login_img.png">

        </div>
       <div>
        <form method="POST" action="Check-login.php">

            <div class="form-group">
                <label >Korisnicko ime:</label>
                <input type="text" class="form-control" id="username" name="username">


            </div>
            <div class="form-group">
                <label>Lozinka:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" >Uloguj se</button>

        </form>

       </div>


    </div>



</body>
</html>