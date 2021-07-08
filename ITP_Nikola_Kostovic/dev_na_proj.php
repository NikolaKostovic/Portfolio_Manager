<?php
$izabrani = $_GET["izabrani_dev"];
$id_projekta = $_GET["projekatID"];
$naziv_projekta = $_GET["naziv_proj"];

include "./db_connection.php";
include "e_mail.php";
if($izabrani != 0)
{
    $connection->query(" INSERT INTO `zaduzenje` (`ZADUZENJE_ID`, `KOR_ID`, `PROJ_ID`) VALUES (NULL, '{$izabrani}', '{$id_projekta}'); ");
    $query_rez=$connection->query(" SELECT * FROM korisnik WHERE KORISNIK_ID = '{$izabrani}' ");
    $row = $query_rez->fetch_array();

    $mail->setFrom('portfoliomanager@gmail.com', 'Portfolio manager');
    $mail->Subject = 'Novi projekat';
    $mail->addAddress($row['KORISNIK_EMAIL'],  $row['KORISNIK_IME']);
    $mail->Body = "Postovani,\nDodati ste na projekat: ".$naziv_projekta."\n".date("Y-m-d")."  ".date("h:i:sa");
    $mail->send();
}

$query_rez = $connection->query("
SELECT
korisnik.KORISNIK_ID,
korisnik.KORISNIK_AVATAR,
projekat.PROJEKAT_ID,
korisnik.KORISNIK_IME,
korisnik.KORISNIK_PREZIME
FROM korisnik
JOIN zaduzenje ON korisnik.KORISNIK_ID = zaduzenje.KOR_ID
JOIN projekat ON projekat.PROJEKAT_ID = zaduzenje.PROJ_ID
");
while ($row_zaduzenja = $query_rez->fetch_array()) {
if($row_zaduzenja['PROJEKAT_ID'] == $id_projekta)
    echo "<img width='40px' src='avatar/".$row_zaduzenja['KORISNIK_AVATAR']."'><h5 class='dev' style='display: inline' id='{$row_zaduzenja['KORISNIK_ID']}'>". $row_zaduzenja['KORISNIK_IME']." ".$row_zaduzenja['KORISNIK_PREZIME']."</h5><hr>";

}


if($_COOKIE['korisnik_uloga'] == "admin" )
{
    echo "<select  style='width: 30%; float: right' class=\"form-control\" id='select'> ";
    echo "<option value='0'>Izaberite</option>";

    include "./db_connection.php";
    $query_rez = $connection->query("SELECT * FROM korisnik WHERE VERIFIKOVAN = 1");
    while ($row = $query_rez->fetch_array())
    {
        $query2 = $connection->query("SELECT * FROM zaduzenje WHERE PROJ_ID = {$id_projekta} AND KOR_ID={$row['KORISNIK_ID']}");
        $nasao = $query2->fetch_array();
        if($nasao == false)
        {
            echo "<option value='{$row['KORISNIK_ID']}'>". $row['KORISNIK_IME']." ".$row['KORISNIK_PREZIME']."</option>";
        }

    }

    echo "</select>";

    echo "
                                              <button onclick='ucitaj(this)' type='button' id='btn_potvrda'; style='float:right;'>Dodaj</button>
                                            ";
}



