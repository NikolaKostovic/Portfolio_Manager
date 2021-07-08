<?php
session_start();
if(!isset($_SESSION['ulogovani_korisnik']) || !isset($_COOKIE['korisnik_uloga']) || !isset($_COOKIE['verifikovan']))
{
    header("Location: Login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/Index-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - evidencija projekata</title>
</head>
<body  style="background-color: snow">
<?php
include "./Navbar.php";

if(isset($_COOKIE['notice'])){
    echo "<div style='background-color: limegreen; border: solid  limegreen 1px;' class='notice'>".$_COOKIE['notice']."</div>";
    setcookie("notice", "", time()-1000);
}

?>
<div class="main">


    <div class="table-container">
        <br><br>

        <div class="toolbar">



            <div>

                <select id="sort" class="form-control">
                    <option value="">Sortiraj</option>
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                </select>

            </div>

            <form class="form-inline my-2 my-lg-0">
                <input style="width: 280px" id="pretraga" class="form-control mr-sm-2" type="search" placeholder="Pretraga" aria-label="Search">

            </form>

                <form class="form-inline my-2 my-lg-0">

                    <?php

                    if($_COOKIE['korisnik_uloga'] == "admin" ){

                        echo "<button type='button' onclick=\"document.location.href='./novi_projekat.php';\">Novi projekat</button>";
                    }

                    ?>

                </form>

        </div>
<hr>
        <table id="result">


        </table>
        <br>


    </div>
    <br>

</div>
<script src="JS/pretraga.js"></script>
</body>
</html>
