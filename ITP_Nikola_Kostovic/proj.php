<?php

$id_projekta = $_GET["data"];
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
    <link rel="stylesheet" type="text/css" href="style/projekti-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - projekat</title>
</head>
    <body  style="background-color: snow">
        <?php
        include "./Navbar.php";

      ?>

        <div class="main">
            <div class="container-tabela">
                <br>
                <?php
                include "./db_connection.php";
                $query_result = $connection->query("SELECT * FROM projekat WHERE PROJEKAT_ID = '{$id_projekta}'");

                $row = $query_result->fetch_array();

                echo "<h3 id='naziv' style='text-align: center'> {$row['PROJEKAT_NAZIV']}</h3><hr>";

                if($_COOKIE['korisnik_uloga'] == "admin" ){
                    echo "<button style='float: right; margin: 0px 0px 4px 5px;' type='button'; onclick='brisanje($id_projekta)' \">Obrisi</button>";
                }

                echo "<button style='float: right; margin: 0px 0px 4px 5px;' type='button'  onclick='izmjene($id_projekta)'\">Izmjeni</button>";

                ?>
            <br>
            <table>
                <?php
                    echo "<br>

                       <tr>
                            <th>Klijent</th>
                            <td>{$row['PROJEKAT_NAZIV_KLIJENTA']}</td>                       
                       </tr>                  
                       <tr>
                            <th>Email</th>
                            <td>{$row['PROJEKAT_EMAIL_KLIJENTA']}</td>                       
                       </tr>                     
                       <tr>
                            <th>Opis</th>
                            <td>{$row['PROJEKAT_OPIS']}</td>                       
                       </tr>                     
                       <tr>
                            <th>Napomena</th>
                            <td>{$row['PROJEKAT_NAPOMENA']}</td>                       
                       </tr>                    
                       <tr>
                            <th>Pocetak projekta</th>
                            <td>{$row['PROJEKAT_OD']}</td>                       
                       </tr>                      
                        <tr>
                            <th>Kraj projekta</th>
                            <td>{$row['PROJEKAT_DO']}</td>                       
                       </tr>                      
                        <tr>
                            <th>Developeri</th>
                            <td>"; ?>

                             <div id="result" title=<?php echo $id_projekta;?>>


                            </div>


                            </td>                       
                       </tr>

            </table>
            <br>
            <h6>Slike projekta:</h6><br>
            <?php
            $query_rez = $connection->query("SELECT * FROM slika WHERE PROJEKAT_ID = {$id_projekta}");
            while ($row = $query_rez->fetch_array()) {
                echo "<br><div><img style='width: 600px' src='{$row['SLIKA_PUTANJA']}'></div>";
            }

            ?>
            <br><br><br>

            </div>

        </div>

    </div>
        <script src="JS/brisanje_editovanje.js"></script>
        <script src="JS/dodavanje_dev.js"></script>
    </body>
</html>
