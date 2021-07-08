<?php
$id_projekta = $_GET["id"];

include "./db_connection.php";
$connection->query("DELETE FROM `projekat` WHERE PROJEKAT_ID =  {$id_projekta};");
$connection->query("DELETE FROM `zaduzenje` WHERE `PROJ_ID` =  {$id_projekta};");
$connection->query("DELETE FROM `slika` WHERE `PROJEKAT_ID` =  {$id_projekta};");
setcookie('notice', "Projekat je uspjesno obrisan!",  time()+10000);
header("Location: index.php");
