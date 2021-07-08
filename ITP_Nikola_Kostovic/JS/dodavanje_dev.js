
var xml = new XMLHttpRequest();
xml.onreadystatechange = function(){
    if (this.status == 200 && this.readyState == 4)
    {
        document.getElementById('result').innerHTML = this.responseText;

    }
};


var div_projekat = document.getElementById('result');

var potvrdi_btn = document.getElementById('btn_potvrda');
var developeri = document.getElementsByTagName('h5'); //pokupimo svakog dev-a na projektu
var naziv_proj = document.getElementById('naziv');


window.addEventListener("load", ucitaj);

function ucitaj(x){

    if(x.type != "load")
    {
        var select_list = document.getElementById('select');
        xml.open("GET", "dev_na_proj.php?izabrani_dev="+select_list.value+"&projekatID="+div_projekat.title+"&naziv_proj="+naziv_proj.innerHTML);
        select_list.value = 0;
        xml.send();
    }
    else
    {
        xml.open("GET", "dev_na_proj.php?izabrani_dev="+null+"&projekatID="+div_projekat.title+"&naziv_proj="+naziv_proj.innerHTML);
        xml.send();
    }


}

