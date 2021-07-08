<?php
session_start();
$id_projekta = $_GET["id"];

if(!isset($_SESSION['ulogovani_korisnik']) )
{
    header("Location: Login.php");
}
include "./db_connection.php";
$query_result = $connection->query("SELECT * FROM projekat WHERE PROJEKAT_ID = '{$id_projekta}'");

$row = $query_result->fetch_array();

$naziv = $row["PROJEKAT_NAZIV"];
$naziv_klijenta = $row["PROJEKAT_NAZIV_KLIJENTA"];
$email_klijenta = $row["PROJEKAT_EMAIL_KLIJENTA"];
$opis = $row["PROJEKAT_OPIS"];

$napomena = $row["PROJEKAT_NAPOMENA"];
$dat_od = $row["PROJEKAT_OD"];
$dat_do = $row["PROJEKAT_DO"];


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

    <title>Portfolio manager - izmjena projekta</title>
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
        <h5>Izmjenite podatke:</h5>
        <hr>
        <p style="float: right; display: inline; color: #ff4d4d;" >*Sva polja su obavezna</p>

        <br>
        <form method="POST" action="dodavanje_projekta.php?data=izm&&id=<?php echo $id_projekta?>" enctype="multipart/form-data" onsubmit="return provjeri_polja()">
            <div class="form-group">
                <label">Naziv projekta</label>
                <input type="text" class="form-control" name="naziv" id="naziv" value="<?php echo $naziv ;?>">
            </div>
            <div class="form-group">
                <label">Klijent</label>
                <input type="text" class="form-control" name="klijent" id="klijent" value="<?php echo $naziv_klijenta ;?>">
            </div>

            <div class="form-group">
                <label">Klijent E-mail</label>
                <input type="text" class="form-control"  name="email" id="email" value="<?php echo $email_klijenta ;?>">
            </div>

            <div class="form-group">
                <label">Opis</label>
                <textarea name="opis" rows="5" class="form-control" id="opis"><?php echo $opis ;?></textarea>

            </div>

            <div class="form-group">
                <label">Napomena</label>
                <textarea name="napomena" rows="5" class="form-control" id="napomena"><?php echo $napomena ;?></textarea>

            </div>
            <br>
            <div class="form-group">
                <label">Vrijeme implementacije</label>
                <label">Od:</label>
                <input type="date"  name="datum_od" value="<?php echo $dat_od ;?>" id="od">
                <label">Do:</label>
                <input type="date"  name="datum_do" value="<?php echo $dat_do ;?>" id="do">
                <br><hr>
            </div>

            <label><h6>Slike</h6></label><br>
            <div style=" display: flex; justify-content: space-between">
                <div class="kontejner_slike" id="slike" title=<?php echo"$id_projekta";?>>

                </div>
                <div>

                    <p>(Za odabir vise slika koristite CTRL tokom selekcije)<p><br>
                        <input type="file" name="img_proj[]" multiple>

                </div>



         </div>
            <br><br><br>
            <button type="submit" >Sacuvaj</button>
        </form>

        <br><br>

        <br>

    </div>
    <br>

</div>
<script src="JS/dodavanje_proj.js"></script>
<script src="JS/brisanje_slika.js"></script>
</body>
</html>
