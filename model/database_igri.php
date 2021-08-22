<?php require('database.php');

function zemi_igri(){
    global $db;
$query='SELECT * FROM igri';
$result=$db->query($query);
return $result;
}

function zemi_igri_po_tip($tip){
    global $db;
    $query="SELECT * FROM igri
            WHERE igra_tip='$tip'
            ORDER BY igra_id";
    $igri=$db->query($query);
    return $igri;
}

function zemi_tipovi_igri(){
    global $db;
    $query="SELECT * FROM tipovi_igri";
    $result=$db->query($query);
    return $result;
}

function add_igra($ime,$tip){
    global $db;
    $query="INSERT INTO igri(igra_ime,igra_tip)
            VALUES('$ime','$tip')";
    $db->exec($query);
}

function add_igra_slika($ime,$slika,$tip){
global $db;
$query="INSERT INTO igri(igra_ime,igra_slika,igra_tip)
            VALUES('$ime','$slika','$tip')";
 $db->exec($query);       
}

function delete_igra($id){
    global $db;
    $query="DELETE FROM igri
            WHERE igra_id='$id'";
    $db->exec($query);
}

function zemi_igra_po_id($id){
    global $db;
    $query="SELECT * FROM igri 
            WHERE igra_id='$id'";
    $result=$db->query($query);
    $result=$result->fetch();
    return $result;
}

function zemi_komentari_po_id($id){
    global $db;
    $query="SELECT * FROM komentari
            WHERE igra_id='$id'";
    $result=$db->query($query);
    return $result;
}

function postavi_komentar_na_igra($igra_id,$komentar){
    global $db;
    $query="INSERT INTO komentari(igra_id,komentar)
            VALUES('$igra_id','$komentar')";
    $db->exec($query);
}

function postavi_ocenka_na_igra($igra_id,$ocenka){
    global $db;
    $query="INSERT INTO oceni(igra_id,ocena)
            VALUES('$igra_id','$ocenka')";
    $db->exec($query);
}

function izbroj_oceni_po_igra($igra_id){
    global $db;
    $query="SELECT COUNT(id) as vkupno FROM oceni
            WHERE igra_id='$igra_id' ";
    $result=$db->query($query);
    $result=$result->fetch();
    return $result;
}

function soberi_oceni_po_igra($igra_id){
    global $db;
    $query="SELECT SUM(ocena) as suma FROM oceni
            WHERE igra_id='$igra_id'";
     $result=$db->query($query);
     $result=$result->fetch();
     return $result;
}

function stavi_ocena_na_igra($igra_id,$ocena){
    global $db;
    $query="UPDATE igri SET igra_ocena='$ocena'
            WHERE igra_id='$igra_id'";
     $db->exec($query);       
    }

function proverka_dali_postoi_igra_so_ime($ime){
    global $db;
    $query="SELECT * FROM igri
            WHERE igra_ime='$ime'"; 
    $result=$db->query($query);
    $result=$result->fetch();
    return $result;
}


?>