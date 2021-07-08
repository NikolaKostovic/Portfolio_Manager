<?php
$proj_id = $_GET["data"];
$slika = $_GET["slika"];

include "./db_connection.php";
if($slika != null)
{
    $connection->query("DELETE FROM `slika` WHERE `SLIKA_ID` =  {$slika};");
}

$query_rez = $connection->query("SELECT * FROM slika WHERE PROJEKAT_ID = '{$proj_id}'");

while ($row = $query_rez->fetch_array()) {

        echo "<img  style='display: inline; margin: 15px 15px 0px 0px' width='100px' src='".$row['SLIKA_PUTANJA']."'> <label style='color: red; font-size: large' id='".$row['SLIKA_ID']."' onclick='ucitaj(this)'><b>X</b></label><br>";

}