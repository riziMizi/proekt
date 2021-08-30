<?php require('database.php');

function zemi_igri_po_tip($tip){
    global $db;
    $query="SELECT * FROM igri
            WHERE dozvolen_pristap=0 AND (igra_tip='$tip' OR igra_vtor_tip='$tip')
            ORDER BY igra_ocena DESC";
    $igri=$db->query($query);
    return $igri;
}

function zemi_tipovi_igri(){
    global $db;
    $query="SELECT * FROM tipovi_igri";
    $result=$db->query($query);
    return $result;
}

function zemi_ime_na_tip($id){
    global $db;
    $query="SELECT * FROM tipovi_igri
            WHERE tip_id='$id'";
    $result=$db->query($query);
    $result=$result->fetch();
    return $result;
}



?>