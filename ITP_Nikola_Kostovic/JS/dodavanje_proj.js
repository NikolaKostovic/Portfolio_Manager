
var naziv = document.getElementById('naziv');
var klijent = document.getElementById('klijent');
var opis = document.getElementById('opis');
var email_klijenta = document.getElementById('email');
var napomena = document.getElementById('napomena');
var datum_od = document.getElementById('od');
var datum_do = document.getElementById('do');
var dugme_brisanje_slika = document.getElementById('brisanje_sl');


function provjeri_polja() {

    if(naziv.value == "" || klijent.value == "" || opis.value == "" || email_klijenta.value == "" || napomena.value == "" || datum_do.value == "" ||  datum_od.value == "")
    {
        alert("Sva polja moraju biti popunjena!");
        return false;
    }
    else return true;
}

function obrisi_slike() {
        if (confirm('Da li zelite da obrisete slike na sa ovog projekta?')) {
            document.location.href = "brisanje_slika.php?id="+dugme_brisanje_slika.name;
        }

}