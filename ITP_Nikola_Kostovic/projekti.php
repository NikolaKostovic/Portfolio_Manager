<?php
$string = $_GET["data"];
$sort =  $_GET["sort"];

include "./db_connection.php";

?>
            <tr>
                <th>Naziv</th>
                <th>Klijent</th>
                <th>E-mail</th>
                <th>Datum pocetka</th>
                <th>Datum zavrsetka</th>

            </tr>
<?php


if($_COOKIE['korisnik_uloga'] == "admin" ){

    if($sort!="")
    {
        $query_result = $connection->query("SELECT * FROM projekat WHERE PROJEKAT_NAZIV LIKE '%{$string}%' ORDER BY PROJEKAT_NAZIV {$sort};");
    }

    else
        $query_result = $connection->query("SELECT * FROM projekat WHERE PROJEKAT_NAZIV LIKE '%{$string}%';");


    while ($row = $query_result->fetch_array()) {
        {
            echo "
            <tr>
                <td><b><a style='font-size: larger' href='proj.php?data={$row['PROJEKAT_ID']}'>" . $row['PROJEKAT_NAZIV'] . "</a><b></td>
                <td>" . $row['PROJEKAT_NAZIV_KLIJENTA'] . "</td>
                <td>" . $row['PROJEKAT_EMAIL_KLIJENTA'] . "</td>
                <td>" . $row['PROJEKAT_OD'] . "</td>
                <td>" . $row['PROJEKAT_DO'] . "</td>
                </tr>
            
            ";

        }
    }
}
else
{
    if($sort =="")
    {
        $query_rez = $connection->query("
                    SELECT 
                    korisnik.KORISNIK_ID, 
                    projekat.PROJEKAT_ID, 
                    projekat.PROJEKAT_NAZIV, 
                    projekat.PROJEKAT_NAZIV_KLIJENTA, 
                    projekat.PROJEKAT_EMAIL_KLIJENTA, 
                    projekat.PROJEKAT_OD, 
                    projekat.PROJEKAT_DO
                    FROM korisnik 
                    JOIN zaduzenje ON korisnik.KORISNIK_ID = zaduzenje.KOR_ID 
                    JOIN projekat ON projekat.PROJEKAT_ID = zaduzenje.PROJ_ID
                    WHERE KORISNIK_ID ='{$_COOKIE['korisnik_id']}' AND PROJEKAT_NAZIV LIKE '%{$string}%'; 
    
                    ");}
    else
    {
        $query_rez = $connection->query("
                    SELECT 
                    korisnik.KORISNIK_ID, 
                    projekat.PROJEKAT_ID, 
                    projekat.PROJEKAT_NAZIV, 
                    projekat.PROJEKAT_NAZIV_KLIJENTA, 
                    projekat.PROJEKAT_EMAIL_KLIJENTA, 
                    projekat.PROJEKAT_OD, 
                    projekat.PROJEKAT_DO
                    FROM korisnik 
                    JOIN zaduzenje ON korisnik.KORISNIK_ID = zaduzenje.KOR_ID 
                    JOIN projekat ON projekat.PROJEKAT_ID = zaduzenje.PROJ_ID
                    WHERE KORISNIK_ID ='{$_COOKIE['korisnik_id']}' AND PROJEKAT_NAZIV LIKE '%{$string}%' ORDER BY PROJEKAT_NAZIV {$sort}; 
    
                    ");
    }


                while ($row = $query_rez->fetch_array()) {
                echo "
                <tr>
                <td><b><a style='font-size: larger' href='proj.php?data={$row['PROJEKAT_ID']}'>".$row['PROJEKAT_NAZIV']."</a></b></td>
                <td>".$row['PROJEKAT_NAZIV_KLIJENTA']."</td>
                <td>".$row['PROJEKAT_EMAIL_KLIJENTA']."</td>
                <td>".$row['PROJEKAT_OD']."</td>
                <td>".$row['PROJEKAT_DO']."</td>
                </tr>
            ";
            }






    }


