
var xml = new XMLHttpRequest();
xml.onreadystatechange = function(){
    if (this.status == 200 && this.readyState == 4)
    {
        document.getElementById('result').innerHTML = this.responseText;
    }
};
var sort = document.getElementById('sort');

var pretraga = document.getElementById('pretraga');

pretraga.addEventListener("mouseout",ucitaj);
pretraga.addEventListener("keyup",ucitaj);
window.addEventListener("load", ucitaj);
sort.addEventListener("change",sortiraj);



function ucitaj(){

    xml.open("GET", "projekti.php?data="+pretraga.value+"&sort="+sort.value);
    xml.send();
}

function sortiraj() {
    console.log(sort.value);
    xml.open("GET", "projekti.php?data="+pretraga.value+"&sort="+sort.value);
    xml.send();
}
