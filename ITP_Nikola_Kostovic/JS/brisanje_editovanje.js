function brisanje(id_projekta) {

    if (confirm('Da li ste sigurni da zelite da obrisete ovaj projekat?')) {
        document.location.href = "brisanje_projekta.php?id="+id_projekta;
    }
}

function izmjene(id_projekta) {

        document.location.href = "izmjena_projekta.php?id="+id_projekta;
}