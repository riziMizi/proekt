<?php require('database.php');

function zemi_igri(){
    global $db;
$query='SELECT * FROM igri';
$result=$db->query($query);
return $result;
}

function add_igra($ime,$tip,$tip2,$username){
    global $db;
    $query="INSERT INTO igri(igra_ime,igra_tip,igra_vtor_tip,dozvolen_pristap,username)
            VALUES(?,?,?,?,?)";
    $db->prepare($query)->execute([$ime,$tip,$tip2,1,$username]);
}

function add_igra_slika($ime,$slika,$tip,$tip2,$username){
global $db;
$query="INSERT INTO igri(igra_ime,igra_slika,igra_tip,igra_vtor_tip,dozvolen_pristap,username)
            VALUES(?,?,?,?,?,?)";
  $db->prepare($query)->execute([$ime,$slika,$tip,$tip2,1,$username]);      
}

function izbrisi_igra($id){
    global $db;
    $query="DELETE FROM igri
            WHERE igra_id='$id'";
    $db->exec($query);

    $query1="DELETE FROM komentari
            WHERE igra_id='$id'";
    $db->exec($query1);

    $query2="DELETE FROM oceni
            WHERE igra_id='$id'";
    $db->exec($query2);
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

function izbrisi_komentar_admin($id){
    global $db;
    $query="DELETE FROM komentari
            WHERE id='$id'";
    $db->exec($query);
}

function postavi_komentar_na_igra($igra_id,$komentar){
    global $db;
    $query="INSERT INTO komentari(igra_id,komentar)
            VALUES(?,?)";
     $db->prepare($query)->execute([$igra_id,$komentar]);
}

function postavi_ocenka_na_igra($igra_id,$ocenka){
    global $db;
    $query="INSERT INTO oceni(igra_id,ocena)
            VALUES(?,?)";
    $db->prepare($query)->execute([$igra_id,$ocenka]);
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

function proverka_dali_postoi_igra_so_ime(){
    global $db;
    $query="SELECT * FROM igri
            WHERE dozvolen_pristap=0";
    $result=$db->query($query);
    return $result;
}

function proverka_predlozena_igra(){
        global $db;
        $query="SELECT * FROM igri
                WHERE dozvolen_pristap=1";
        $result=$db->query($query);
        return $result;
    }

function zemi_top_10(){
    global $db;
    $query="SELECT * FROM igri
            WHERE dozvolen_pristap=0 
            ORDER BY igra_ocena DESC LIMIT 10";
    $result=$db->query($query);
    return $result;
}

function search_igri($ime){
    $nizaKirilica=['а','б','в','г','д','ѓ','е','ж','з','ѕ','и','ј','к','л','љ','м','н','њ','о','п','р','с','т','ќ','у','ф','х','ц','ч','џ','ш'];    
    $nizaLatinica=['a','b','v','g','d','gj','e','zh','z','dz','i','j','k','l','lj','m','n','nj','o','p','r','s','t','kj','u','f','h','c','ch','dj','sh'];
    $searchKirilica=str_replace($nizaLatinica,$nizaKirilica,$ime);
    $searchLatinica=str_replace($nizaKirilica,$nizaLatinica,$ime);
    global $db;
    $query="SELECT * FROM igri
            WHERE dozvolen_pristap=0 AND igra_ime LIKE '%$searchKirilica%' 
            UNION 
            SELECT * FROM igri
            WHERE dozvolen_pristap=0 AND igra_ime LIKE '%$searchLatinica%'
            ORDER BY igra_ocena DESC ";
    $result=$db->query($query);
    return $result;
}

function zemi_novi_igri(){
    global $db;
$query='SELECT * FROM igri
        WHERE dozvolen_pristap=1';
$result=$db->query($query);
return $result;
}

function dodadi_igra_admin($ime){
    global $db;
    $query="UPDATE igri SET dozvolen_pristap=0
            WHERE igra_ime='$ime'";
     $db->exec($query);  
}

function izbrisi_igra_admin($ime){
    global $db;
    $query="DELETE FROM igri
            WHERE igra_ime='$ime'";
    $db->exec($query);
}

function update_igra_admin($ime,$prvTip,$vtorTip){
    global $db;
    $query="UPDATE igri SET igra_tip='$prvTip',igra_vtor_tip='$vtorTip'
            WHERE igra_ime='$ime'";
     $db->exec($query); 
}

function update_igra_admin_slika($ime,$prvTip,$vtorTip,$slika){
    global $db;
    $query="UPDATE igri SET igra_tip='$prvTip',igra_vtor_tip='$vtorTip',igra_slika='$slika'
            WHERE igra_ime='$ime'";
     $db->exec($query); 
}
?>