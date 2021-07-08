<?php
session_start();

if(isset($_SESSION['ulogovani_korisnik']) || isset($_COOKIE['korisnik_uloga']))
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
    <link rel="stylesheet" type="text/css" href="style/Index-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - registracija</title>
</head>
<body  style="background-color: snow">
    <?php
    include "./Navbar.php";

    if(isset($_COOKIE['notice'])){
    echo "<div style='background-color: #ff4d4d; border: solid  limegreen 1px;' class='notice'>".$_COOKIE['notice']."</div>";
    setcookie("notice", "", time()-1000);
    }
    ?>
    <div class="main">
        <div class="registracija_forma">
            <br>
            <h5>Registracija:</h5>
            <hr>
            <p style="float: right; display: inline; color: #ff4d4d;" >*Sva polja su obavezna</p>
            <br>
            <form method="POST" action="Check-reg.php" enctype="multipart/form-data"  onsubmit="return provjeri_formu()">

                <div class="form-group">
                    <label">Ime</label>
                    <input type="text" class="form-control" name="ime" id="ime">
                </div>
                <div class="form-group">
                    <label">Prezime</label>
                    <input type="text" class="form-control" name="prezime" id="prezime">
                </div>

                <div class="form-group">
                    <label">Pol</label>
                    <select class="form-control" name="pol" id="pol">
                        <option value=""></option>
                        <option value="m">Muski</option>
                        <option value="z">Zenski</option>
                        <option value="o">Ostalo</option>

                    </select>
                </div>

                <div class="form-group">
                    <label">E-mail</label>
                    <input type="email" class="form-control"  name="email" id="email">
                </div>

                <div class="form-group">
                    <label">Mjesto</label>
                    <input type="text" class="form-control"  name="mjesto" id="mjesto">
                </textarea>

                </div>

                <hr>
                <p>Izaberite avatar</p>
                <input checked type="radio" id="predlozen" name="avatar" value="predlozen">
                <label for="predlozen">Predlozen</label><br>
                <input  type="radio" id="svoj" name="avatar" value="svoj">
                <label for="svoj">Izaberi svoj</label><br>

                <div class="form-group" id="avatar_browse" style="display: none">
                    <input type="file" name="img_avatar" accept="image/png, image/jpeg" id="avatar">
                </div>

                <hr><br>
                <div class="form-group">
                    <label">Korisnicko ime</label>
                    <input type="text" class="form-control" id="kor_ime" name="kor_ime" >
                </div>
                <hr>
                <p>Izaberite lozinku</p>
                <p id="nd" >-Najmanja duzina je 4 znaka </p><p id="il">-Lozinke moraju biti iste</p>
                <div class="form-group">
                    <label">Lozinka</label>
                    <input type="password" class="form-control" id="lozinka" name="lozinka" >
                </div>
                <div class="form-group">
                    <label">Ponovi lozinku</label>
                    <input  type="password" class="form-control" id="lozinka2" name="lozinka2" >
                </div>
                <hr><br>
                <div  >
                    <button  id="dugme_potvrdi" type="submit" >Potvrdi</button>
                </div>

                <br><br><br>


            </form>

        </div>

    </div>
    <script src="JS/registracija_forma.js"></script>
</body>
</html>