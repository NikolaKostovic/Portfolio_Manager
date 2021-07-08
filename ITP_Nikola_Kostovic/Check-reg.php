<?php
$isto_kor_ime = false;
$ime = $_REQUEST['ime'];
$prezime = $_REQUEST['prezime'];
$email = $_REQUEST['email'];
$pol = $_REQUEST['pol'];
$mjesto = $_REQUEST['mjesto'];
$avatar = $_REQUEST['avatar'];
$korisnicko_ime = $_REQUEST['kor_ime'];
$lozinka =md5($_REQUEST['lozinka']);
$zauzeto = false;

$aktivacijski_kod = md5(time());




include "./db_connection.php";
$query_result = $connection->query("SELECT * FROM korisnik");


if($avatar == "svoj")
{
    $target_dir = "avatar/";
    $target_file = $target_dir . basename($_FILES["img_avatar"]["name"]);
    $putanja = basename($_FILES["img_avatar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['img_avatar']['tmp_name'], $target_file) ;
}
else
{
    if($pol == "m")
    {
        $putanja = "m_avatar.png";
    }
    else if($pol == "z")
    {
        $putanja = "z_avatar.png";
    }
    else
    {
        $putanja = "o_avatar.png";
    }
}

while ($row = $query_result->fetch_array()) {
    if ($row['KORISNIK_USERNAME'] == $korisnicko_ime)
    {
        $zauzeto = true;
        setcookie('notice', "Korisnicko ime je zauzeto!",  time()+10000);
        header("Location: registration.php");
    }
}


if($zauzeto==false)
{
    $query_result = $connection->query("INSERT INTO `korisnik` (`KORISNIK_ID`, `KORISNIK_USERNAME`, `KORISNIK_PASSWORD`, `KORISNIK_IME`, `KORISNIK_PREZIME`,`KORISNIK_POL`, `TIP_ID`, `KORISNIK_EMAIL`, `KORISNIK_AVATAR`, `KORISNIK_MJESTO`, `VERIFIKOVAN`, `KOD_VERIFIKACIJA`) 
                                            VALUES (NULL, '{$korisnicko_ime}', '{$lozinka}', '{$ime}', '{$prezime}','{$pol}', '2', '{$email}', '{$putanja}', '{$mjesto}', FALSE, '{$aktivacijski_kod}');
                                            ");
    include "e_mail.php";
    $mail->setFrom('portfoliomanager@gmail.com', 'Portfolio manager');
    $mail->Subject = 'Aktivacija naloga';
    $mail->addAddress($email, $ime);
    $mail->Body = "Postovani,\nDa bi ste aktivirali nalog, kopirajte ovaj aktivacijski kod:\n\n{$aktivacijski_kod}\n\nPozdrav";
    $mail->send();

    setcookie('notice_reg', "Uspjesno ste se registrovali! \nUlogujte se da bi aktivirali nalog!",  time()+10000);
    header("Location: Login.php");
}
