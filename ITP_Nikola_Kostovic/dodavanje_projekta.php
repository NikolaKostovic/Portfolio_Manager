<?php
$izmjena_projekta = "";
$naziv = $_REQUEST["naziv"];
$klijent  = $_REQUEST["klijent"];
$klijent_email  = $_REQUEST["email"];
$opis  = $_REQUEST["opis"];
$napomena  = $_REQUEST["napomena"];
$od  = $_REQUEST["datum_od"];
$do  = $_REQUEST["datum_do"];

if(isset($_GET["data"]))
{
    $izmjena_projekta = $_GET["data"];
}

if(isset($_GET["id"]))
{
    $id_proj = $_GET["id"];
}


include "./db_connection.php";

if ($izmjena_projekta == "izm")
{
    $query = "UPDATE `projekat` SET `PROJEKAT_NAZIV` = '{$naziv}', 
                     `PROJEKAT_NAZIV_KLIJENTA` = '{$klijent}', 
                     `PROJEKAT_EMAIL_KLIJENTA` = '{$klijent_email}', 
                     `PROJEKAT_OPIS` = '{$opis}',
                     `PROJEKAT_NAPOMENA` = '{$napomena}', 
                     `PROJEKAT_OD` = '{$od}', 
                     `PROJEKAT_DO` = '{$do}' 
                     WHERE PROJEKAT_ID = {$id_proj};
   ";

    $query_result = $connection->query($query);
    echo $query_result;
    if($query_result == 1)
    {
        setcookie('notice', "Uspjesno ste sacuvali izmjene na projektu ".$naziv."!",  time()+10000);
        header("Location: index.php");
    }
}
else
{
    $query = "INSERT INTO `projekat` (
    PROJEKAT_ID, 
    PROJEKAT_NAZIV, 
    PROJEKAT_NAZIV_KLIJENTA, 
    PROJEKAT_EMAIL_KLIJENTA, 
    PROJEKAT_OPIS, 
    PROJEKAT_NAPOMENA, 
    PROJEKAT_OD, 
    PROJEKAT_DO) 
    VALUES (NULL, '{$naziv}', '{$klijent}', '{$klijent_email}', '{$opis}', '{$napomena}', '{$od}', '{$do}') ;";

    $query_result = $connection->query($query);

    $query = " SELECT * FROM `projekat` ORDER BY `projekat`.`PROJEKAT_ID` DESC";
    $query_result = $connection->query($query);
    $poslednji_upisani = $query_result->fetch_array();
    $id_proj = $poslednji_upisani['PROJEKAT_ID'];
    if($query_result == 1)
    {
        setcookie('notice', "Novi projekat je uspjesno dodat! Sada mozete dodati developere na projekat!",  time()+10000);
        header("Location: index.php");
    }
}


if (isset($_FILES['img_proj'])) {
    $slike = $_FILES['img_proj'];
    $broj_slika = count($slike["name"]);

    for ($i = 0; $i < $broj_slika; $i++) {

        if ($slike["size"][$i] > 5000000) {
            setcookie('notice', "Slika ne smije biti veca od 5MB!",  time()+10000);
            header("Location: novi_projekat.php");
        }
        $target_dir = "img/";
        $target_file = $target_dir . basename($slike["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($slike['tmp_name'][$i] , $target_file) ;
        $query = "INSERT INTO `slika` (`SLIKA_ID`, `SLIKA_PUTANJA`, `PROJEKAT_ID`) VALUES (NULL, '{$target_file}', '{$id_proj}')";
        $connection->query($query);
    }
}



