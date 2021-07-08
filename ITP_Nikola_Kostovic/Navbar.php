
<nav class="navbar" style="height: 56px; padding: 0px; box-shadow: 0px 0px 7px;" >

<nav class="navbar" style="margin: 0 auto;padding: 0px; height: 56px;  width: 85%;">

    <div class="navbar-opcije">
        <?Php

        if(isset($_COOKIE['korisnik_uloga']))
    {
        if($_COOKIE['korisnik_uloga'] == "admin" ){
            $uloga="Administrator";
            echo "<button onclick=\"document.location.href='./index.php';\"'>Projekti</button>";
            echo "<button onclick=\"document.location.href='./korisnici.php';\" style='margin-left: 10px'>Korisnici</button>";
        }
        else
        {
            $uloga="Developer";
            echo "<button onclick=\"document.location.href='./index.php';\" style='margin-left: 2px'>Projekti</button>";
        }
        ?>

    </div> <div> <label class="ime"><?php echo  "$uloga / <b>".$_COOKIE['korisnik_ime'];?>   </b> </label><img style='width: 38px' src='avatar/<?php echo $_COOKIE['avatar_link'];?>'>
        <?php

        echo "<button onclick=\"document.location.href='./Logout.php';\" style=' background-color: transparent; margin-left: 20px; color: whitesmoke'><b>Odjava</b></button></div>";

    }
    else
    {
        echo "<div style=\"height: 50px\">
        <h4>Portfolio manager</h4>
        <h6 style=\"margin-top: -10px; color: #e6ffff\">evidencija projekata</h6>
            </div>
        </div> <div>";
        if (strpos($_SERVER['REQUEST_URI'], "Login") !== false)
         {


             echo "<button onclick=\"document.location.href='./registration.php';\" style=' background-color: transparent; margin-left: 10px; color: whitesmoke'><b>Registracija</b></button>";
        }
        else

            echo "<button onclick=\"document.location.href='./Login.php';\" style=' background-color: transparent; margin-left: 10px; color: whitesmoke'><b>Login</b></button>";

    }
    ?>

</div>
</nav>

</nav>

<div style=" margin-bottom: 40px; ">

</div>


