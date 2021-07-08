<?php
session_start();
session_unset();
session_destroy();

setcookie('korisnik_uloga', "", time()-1000);
setcookie('korisnik_ime', "", time()-1000);

header("Location: Login.php");
?>