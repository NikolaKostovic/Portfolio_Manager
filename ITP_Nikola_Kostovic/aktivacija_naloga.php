<?php
$email_korisnika = $_GET["email"];

if(isset($_POST["aktiviraj"]))
{
    $kod = $_POST['kod'];
    include "./db_connection.php";
    $query_result = $connection->query("SELECT * FROM korisnik");
    while ($row = $query_result->fetch_array()) {
       if ($row['KORISNIK_ID'] == $_COOKIE['korisnik_id'])
       {
           if($row['KOD_VERIFIKACIJA'] == $kod)
           {
               $connection->query("UPDATE `korisnik` SET `VERIFIKOVAN` = '1' WHERE `korisnik`.`KORISNIK_ID` = {$_COOKIE['korisnik_id']};");
               setcookie('notice', "Uspjesno ste verifikovali nalog!",  time()+10000);
               header("Location: index.php");
           }
           else
           {
               echo "<div style='width: 100%; background-color:  #ff4d4d; border: solid   #ff4d4d 1px;' class='notice'>Uneseni kod nije ispravan!</div>";
           }

       }
    }

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
    echo "<div style='width: 100%; background-color: #ff4d4d; border: solid  #ff4d4d 1px;' class='notice'>".$_COOKIE['notice']."</div>";
    setcookie("notice", "", time()-1000);
}


?>
<div class="main">

    <div class="table-container">
        <br><br>
        <h5>Vas nalog nije aktiviran.</h5>
        <hr>
        <p>Da bi aktivirali nalog, unesite kod koji smo Vam poslali na e-mail: <b> <?php echo $email_korisnika;?></b></p>
        <br>
        <form method="POST" action="aktivacija_naloga.php?email=<?php echo $email_korisnika;?>">

            <div class="form-group">
                <label >Aktivacijski kod:</label>
                <input style="width: 50%;" type="text" class="form-control" id="kod" name="kod">

            </div>
            <br>
            <button type="submit" name="aktiviraj" >Aktiviraj</button>

        </form>

    </div>
    <br>
    <br>

</div>
<script src="JS/pretraga.js"></script>
</body>
</html>
