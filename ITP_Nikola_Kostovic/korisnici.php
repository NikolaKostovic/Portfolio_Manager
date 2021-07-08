<?php
session_start();
if(!isset($_SESSION['ulogovani_korisnik']) || $_COOKIE['korisnik_uloga'] != "admin")
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
    <link rel="stylesheet" type="text/css" href="style/Index-style.css">
    <link rel="stylesheet" type="text/css" href="style/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Portfolio manager - korisnici</title>
</head>
<body  style="background-color: snow">
<?php
include "./Navbar.php";?>

<div class="main">


    <div class="table-container">
        <br>
        <h5>Korisnici:</h5>

        <table>
            <tr>
                <th>Avatar</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Pol</th>
                <th>E-mail</th>
                <th>Mjesto</th>
                <th>Verifikovan</th>

            </tr>

            <?php
            include "./db_connection.php";
            $query_result = $connection->query("SELECT * FROM korisnik");

                while ($row = $query_result->fetch_array())
                {
                    if($row['KORISNIK_ID'] == ($_COOKIE['korisnik_id']))
                    {
                        echo "
                        <tr>
                            <td><img style='width: 50px' src=".'avatar/'.$row['KORISNIK_AVATAR'].'.'."></td>
                            <td><b>".$row['KORISNIK_IME']."</b></td>
                            <td><b>".$row['KORISNIK_PREZIME']."</b></td>
                            <td><b>".strtoupper($row['KORISNIK_POL'])."</b></td>
                            <td><b>".$row['KORISNIK_EMAIL']."</b></td>
                            <td><b>".$row['KORISNIK_MJESTO']."</b></td>";
                        if($row['VERIFIKOVAN']== 0)
                            echo " <td>NE</td></tr>";
                        else
                            echo " <td>DA</td></tr>";

                    }
                    else
                    {
                        echo "
                        <tr>
                            <td><img style='width: 50px' src=".'avatar/'.$row['KORISNIK_AVATAR'].'.'."></td>
                            <td>".$row['KORISNIK_IME']."</td>
                            <td>".$row['KORISNIK_PREZIME']."</td>
                             <td>".strtoupper($row['KORISNIK_POL'])."</td>
                            <td>".$row['KORISNIK_EMAIL']."</td>
                            <td>".$row['KORISNIK_MJESTO']."</td>";
                        if($row['VERIFIKOVAN']== 0)
                            echo " <td>NE</td></tr>";
                        else
                            echo " <td>DA</td></tr>";

                    }

                }
            ?>

        </table>
        <br>


    </div>
    <br>

</div>

</body>
</html>
