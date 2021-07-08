var xml = new XMLHttpRequest();
xml.onreadystatechange = function(){
    if (this.status == 200 && this.readyState == 4)
    {
        document.getElementById('slike').innerHTML = this.responseText;
    }
};

var proj = document.getElementById('slike')

window.addEventListener("load", ucitaj);
//sort.addEventListener("change",sortiraj);

function ucitaj(x){
    if(x.id != null)
    {
        if(confirm("Da li ste sigurni da zelite obrisati ovu sliku?"))
        {
            xml.open("GET", "slike_na_projektu.php?data="+proj.title+"&slika="+x.id);
            xml.send();
        }

    }
    else
    {
        xml.open("GET", "slike_na_projektu.php?data="+proj.title+"&slika="+null);
        xml.send();
    }




}