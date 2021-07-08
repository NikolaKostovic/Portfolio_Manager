<?php
session_start();
if(!isset($_SESSION['ulogovani_korisnik']))
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
    <link rel="stylesheet" type="text/css" href="style/index-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - novi projekat</title>
</head>
<body  style="background-color: snow">
<?php
include "./Navbar.php";

if(isset($_COOKIE['notice'])){
    echo "<div  class='notice'>".$_COOKIE['notice']."</div>";
    setcookie("notice", "", time()-1000);
}
?>

<div class="main">


    <div class="table-container">
        <br>
        <h5>Unesite podatke:</h5>
        <hr>
        <p style="float: right; display: inline; color: #ff4d4d;" >*Sva polja su obavezna</p>

        <br>
        <form method="POST" action="dodavanje_projekta.php" enctype="multipart/form-data" onsubmit="return provjeri_polja()">
            <div class="form-group">
                <label">Naziv projekta</label>
                <input type="text" class="form-control" name="naziv" id="naziv">
            </div>
            <div class="form-group">
                <label">Klijent</label>
                <input type="text" class="form-control" name="klijent" id="klijent">
            </div>

            <div class="form-group">
                <label">Klijent E-mail</label>
                <input type="text" class="form-control"  name="email" id="email">
            </div>

            <div class="form-group">
                <label">Opis</label>
                <textarea name="opis" rows="5" class="form-control" id="opis"></textarea>

            </div>

            <div class="form-group">
                <label">Napomena</label>
                <textarea name="napomena" rows="5" class="form-control" id="napomena"></textarea>

            </div>
<br>
            <div class="form-group">
                <label">Vrijeme implementacije</label>
                <label">Od:</label>
                <input type="date"  name="datum_od" id="od">
                <label">Do:</label>
                <input type="date"  name="datum_do" id="do">

            </div>

            <br>

            <div class="form-group">
                <label">Slike</label><br>(Za odabir vise slika koristite CTRL tokom selekcije)<br><br>

                <input type="file" name="img_proj[]" multiple>
            </div>

<br><br>
            <button type="submit" >Potvrdi</button>
        </form>
        <br><br><br>

        <br>

    </div>
    <br>

</div>
<script src="JS/dodavanje_proj.js"></script>
</body>
</html>
