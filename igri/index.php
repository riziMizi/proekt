<?php
require ('../model/database_igri.php');
if (isset($_POST['action']))
{
    $action = $_POST['action'];
}
else if (isset($_GET['action']))
{
    $action = $_GET['action'];
}
else
{
    $action = 'ispecati_igri_po_kategorija';
}

if ($action == 'ispecati_igri_po_kategorija')
{
    $tip = $_GET['tip_id'];
    $igri = zemi_igri_po_tip($tip);
    include ('ispecati_igri.php');
}
else if ($action == 'show_add_igra')
{
    include ('dodadi_igra.php');
}
else if ($action == 'add_igra')
{
    $ime = $_POST['ime'];
    $tip = $_POST['prv_tip'];
    $vtorTip=$_POST['vtor_tip'];
    $znameIgraTip=0;
    $znameIgra=0;
    if(!empty($vtorTip)){
        if($tip!=$vtorTip){
            $znameIgraTip=1;
        }
    }
    $proverkaIme=proverka_dali_postoi_igra_so_ime($ime);
    if(strtolower($proverkaIme['igra_ime'])!=strtolower($ime)){
        $target_dir = 'images';
        $path = getcwd() . DIRECTORY_SEPARATOR . $target_dir;
        if (isset($_FILES['slika']))
        {
            $filename = $_FILES['slika']['name'];
            $tmp_name = $_FILES['slika']['tmp_name'];
            $name = $path . DIRECTORY_SEPARATOR . $filename;
            if (!empty($filename))
            {
                $fileExt = explode('.', $filename);
                $fileExtLow = strtolower($fileExt[1]);
                $dozvoleniExt = array(
                    'jpg',
                    'png',
                    'jpeg'
                );
                if (in_array($fileExtLow, $dozvoleniExt))
                {
                    move_uploaded_file($tmp_name, $name);
                    if($znameIgraTip==1){
                        add_igra_slika($ime, $filename,$tip,$vtorTip);
                    }else{
                        add_igra_slika($ime, $filename,$tip,0);
                    }
                    $znameIgra=1;
                }
                else
                {
                    $error = "Nedozvolen tip na file!Dozvoleni tipovi se:jpg,jpeg,png";
                    include ('../errors/error.php');
                    exit();
                }
            }
        }
        if($znameIgra==0){
            if($znameIgraTip==1){
            add_igra($ime, $tip,$vtorTip);
            }else{
                add_igra($ime, $tip,0);
            }

        }
      // header("Location: .?tip_id=$tip");
    }else{
        echo "Igrata sto ja vnesovte veke postoi";
    }
}
else if($action=='delete_igra')
{
  $target_dir = 'images';
  $path = getcwd() . DIRECTORY_SEPARATOR . $target_dir;
    $igra_id=$_POST['igra_id'];
    $igra_tip=$_POST['igra_tip'];
    $igra_slika=$_POST['igra_slika'];
    delete_igra($igra_id);
        if(!empty($igra_slika)){
               $slika=$path .  DIRECTORY_SEPARATOR . $igra_slika;
                unlink($slika);

          }
   header("Location: .?tip_id=$igra_tip");
}
else if($action=='info_igra')
{
    $igra_id=$_GET['igra_id'];
    if(isset($_GET['postavi'])){
        $postavi=$_GET['postavi'];
         if($postavi=='ocenka'){
            $ocenka=$_POST['ocena'];
            if(!empty($ocenka)){
            postavi_ocenka_na_igra($igra_id,$ocenka);
            }
            $komentar=$_POST['komentar'];
            postavi_komentar_na_igra($igra_id,$komentar);
            $vkupnoOceni=izbroj_oceni_po_igra($igra_id);
            $sumaOceni=soberi_oceni_po_igra($igra_id);
            if($vkupnoOceni['vkupno']!=0){
            $prosek=round($sumaOceni['suma']/$vkupnoOceni['vkupno'],1);
            }else{
                $prosek=0;
            }
            stavi_ocena_na_igra($igra_id,$prosek);
        }
    }
    $igra=zemi_igra_po_id($igra_id);
    $komentari=zemi_komentari_po_id($igra_id);
    include('info_igra.php');
}
?>
