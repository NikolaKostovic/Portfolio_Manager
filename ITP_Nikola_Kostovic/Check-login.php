<?php
session_start();

$pronasao = false;
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);


if($username=="" || $password == ""){
    setcookie('notice', "Korisnicko ime i lozinka ne smiju biti prazni!",  time()+10000);
    header("Location: Login.php");
}
else {
    include "./db_connection.php";
    $query_result = $connection->query("SELECT * FROM korisnik");

    while ($row = $query_result->fetch_array()) {
        if ($username == $row['KORISNIK_USERNAME'] && $password == $row['KORISNIK_PASSWORD']) {

            $pronasao = true;

            if($row['TIP_ID']=="1")
            {
                setcookie('korisnik_uloga', "admin",  time()+86400 );
            }
            else
                setcookie('korisnik_uloga', "dev",  time()+86400 );

            setcookie('avatar_link', $row['KORISNIK_AVATAR'] ,  time()+86400);
            setcookie('korisnik_id', $row['KORISNIK_ID'] ,  time()+86400);
            setcookie('korisnik_ime', $row['KORISNIK_IME'] ,  time()+86400);
            setcookie('verifikovan', $row['VERIFIKOVAN'] ,  time()+86400);

            $_SESSION['ulogovani_korisnik']= $row['KORISNIK_IME'];

            if($row['VERIFIKOVAN'] == 0)
                header("Location: aktivacija_naloga.php?email={$row['KORISNIK_EMAIL']}");
            else
                header("Location: index.php");

        }

    }
    if($pronasao == false)
    {
        setcookie('notice', "Neuspjesna prijava! Unesite ispravne podatke!",  time()+10000);
        header("Location: Login.php");
    }

}



