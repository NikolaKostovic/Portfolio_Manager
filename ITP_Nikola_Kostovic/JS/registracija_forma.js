var iste = false;
var duzina = false;
var k_ime = false;

var ime = document.getElementById('ime');
var prezime = document.getElementById('prezime');
var pol = document.getElementById('pol');
var email = document.getElementById('email');
var mjesto = document.getElementById('mjesto');
var avatar = document.getElementById('avatar');

var av_browse = document.getElementById('avatar_browse');
var rb_predlozen = document.getElementById('predlozen');
var rb_svoj = document.getElementById('svoj');

rb_predlozen.addEventListener("change", osvjezi);
rb_svoj.addEventListener("change", osvjezi);


var kor_ime = document.getElementById('kor_ime');
var lozinka1 = document.getElementById('lozinka');
var lozinka2 = document.getElementById('lozinka2');
var nd = document.getElementById('nd');
var il = document.getElementById('il');

kor_ime.addEventListener("keyup",provjeri_duzinu_kor_imena);
lozinka1.addEventListener("keyup", provjeri_loz);
lozinka2.addEventListener("keyup", provjeri_loz);


function osvjezi(){

    if (av_browse.style.display === "none") {
        av_browse.style.display = "block";
    } else {
        av_browse.style.display = "none";

    }
}

function provjeri_loz() {

    if(lozinka1.value == lozinka2.value && lozinka1.value != "")
    {
        il.style.backgroundColor = "#66ff66";
        iste = true;
    }
    else
    {
        il.style.backgroundColor = "#ffad99";
        iste = false;
    }

    if(lozinka1.value.length >= 4)
    {
        nd.style.backgroundColor = "#66ff66";
        duzina=true;
    }
    else
    {
        nd.style.backgroundColor = "#ffad99";
        duzina=false;
    }

}

function provjeri_duzinu_kor_imena() {
    if (kor_ime.value.length < 4)
    {
        kor_ime.style.backgroundColor ="#ffad99";
        k_ime=false;

    }
    else
        {
        kor_ime.style.backgroundColor = "#66ff66";
        k_ime=true;

        }

}


function  provjeri_formu()
{

    if(ime.value == "" || prezime.value == "" || pol.value == "" || email.value == "" ||mjesto.value == ""  )
    {
        alert("Sva polja moraju biti popunjena!");
        return false;
    }
    else
    {
        provjeri_duzinu_kor_imena();
        provjeri_loz();
        if(duzina == true && k_ime == true && iste == true) {
            if (rb_svoj.checked == true ) {
                if(avatar.files.length > 0)
                {
                    return true;
                }
                else
                {
                    alert("Izaberite sliku za avatar.");
                    return false;
                }

            }
            else
                return true;
        }
        else
        {
           alert("Korisnicko ime i lozinka moraju imati najmanje 4 karaktera. Lozinke moraju biti iste.");
           return false;
        }
    }
}



