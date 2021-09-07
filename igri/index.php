<?php
require ('../model/database_igri.php');
require ('../model/database_tip.php');
require ('../class/mail.php');
require ('../model/login.php');
require ('../class/klasa_igra.php');
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
    $imeTip = zemi_ime_na_tip($tip);
    include ('ispecati_igri.php');
}
else if ($action == 'show_add_igra')
{
    include ('dodadi_igra.php');
}
else if ($action == 'add_igra')
{
    $nizaKirilica = ['а', 'б', 'в', 'г', 'д', 'ѓ', 'е', 'ж', 'з', 'ѕ', 'и', 'ј', 'к', 'л', 'љ', 'м', 'н', 'њ', 'о', 'п', 'р', 'с', 'т', 'ќ', 'у', 'ф', 'х', 'ц', 'ч', 'џ', 'ш'];
    $nizaLatinica = ['a', 'b', 'v', 'g', 'd', 'gj', 'e', 'zh', 'z', 'dz', 'i', 'j', 'k', 'l', 'lj', 'm', 'n', 'nj', 'o', 'p', 'r', 's', 't', 'kj', 'u', 'f', 'h', 'c', 'ch', 'dj', 'sh'];
    $ime = $_POST['ime'];
    $tip = $_POST['prv_tip'];
    $vtorTip = $_POST['vtor_tip'];
    $username = $_SESSION['username'];
    $znameIgraTip = 0;
    $znameIgra = 0;
    $znameIstoIme = 0;
    $znamePredlozenaIme = 0;
    if (!empty($vtorTip))
    {
        if ($tip != $vtorTip)
        {
            $znameIgraTip = 1;
        }
    }
    $imePomMali = mb_strtolower($ime, 'UTF-8');
    $imePom = str_replace($nizaKirilica, $nizaLatinica, $imePomMali);
    $proverkaIme = proverka_dali_postoi_igra_so_ime();
    foreach ($proverkaIme as $i)
    {
        $i['igra_ime'] = mb_strtolower($i['igra_ime'], 'UTF-8');
        $i['igra_ime'] = str_replace($nizaKirilica, $nizaLatinica, $i['igra_ime']);
        if (strcmp($i['igra_ime'], $imePom) == 0)
        {
            $znameIstoIme = 1;
        }
    }
    $proverkaPredlozenaIme = proverka_predlozena_igra();
    foreach ($proverkaPredlozenaIme as $i)
    {
        $i['igra_ime'] = mb_strtolower($i['igra_ime'], 'UTF-8');
        $i['igra_ime'] = str_replace($nizaKirilica, $nizaLatinica, $i['igra_ime']);
        if (strcmp($i['igra_ime'], $imePom) == 0)
        {
            $znamePredlozenaIme = 1;
        }
    }

    if ($znameIstoIme == 0)
    {
        if ($znamePredlozenaIme == 0)
        {
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
                        'jpeg',
                        'jfif'
                    );
                    if (in_array($fileExtLow, $dozvoleniExt))
                    {
                        move_uploaded_file($tmp_name, $name);
                        if ($znameIgraTip == 1)
                        {
                            add_igra_slika($ime, $filename, $tip, $vtorTip, $username);
                        }
                        else
                        {
                            add_igra_slika($ime, $filename, $tip, 0, $username);
                        }
                        $znameIgra = 1;
                    }
                    else
                    {
                        $error = "Недозволен тип на file!Дозволени типови се:jpg,jpeg,png,jfif";
                        include ('../errors/error.php');
                        exit();
                    }
                }
            }
            if ($znameIgra == 0)
            {
                if ($znameIgraTip == 1)
                {
                    add_igra($ime, $tip, $vtorTip, $username);
                }
                else
                {
                    add_igra($ime, $tip, 0, $username);
                }
            }
            header("Location: index.php?action=show_add_igra&error=uspesno_predlozena");
        }
        else
        {
            header("Location: index.php?action=show_add_igra&error=igrata_predlozena");
            exit();
        }
    }
    else
    {
        header("Location: index.php?action=show_add_igra&error=igrata_postoi");
        exit();
    }
}
else if ($action == 'izbrisi_igra')
{
    $target_dir = 'images';
    $path = getcwd() . DIRECTORY_SEPARATOR . $target_dir;
    $igra_id = $_POST['igra_id'];
    $igra_slika = $_POST['igra_slika'];
    izbrisi_igra($igra_id);
    if (!empty($igra_slika))
    {
        $slika = $path . DIRECTORY_SEPARATOR . $igra_slika;
        unlink($slika);
    }
    header("Location: ../index.php");
}
else if ($action == 'info_igra')
{
    $igra_id = $_GET['igra_id'];
    if (isset($_GET['postavi']))
    {
        $postavi = $_GET['postavi'];
        if ($postavi == 'ocenka')
        {
            $ocenka = $_POST['ocena'];
            if (!empty($ocenka))
            {
                postavi_ocenka_na_igra($igra_id, $ocenka);
            }
            $komentar = $_POST['komentar'];
            $datum = date("Y/m/d");
            postavi_komentar_na_igra($igra_id, $komentar, $datum);
            $vkupnoOceni = izbroj_oceni_po_igra($igra_id);
            $sumaOceni = soberi_oceni_po_igra($igra_id);
            if ($vkupnoOceni['vkupno'] != 0)
            {
                $prosek = round($sumaOceni['suma'] / $vkupnoOceni['vkupno'], 1);
            }
            else
            {
                $prosek = 0;
            }
            stavi_ocena_na_igra($igra_id, $prosek);
        }
        else if ($postavi == 'izbrisi_komentar')
        {
            $komentar_id = $_POST['komentar_id'];
            izbrisi_komentar_admin($komentar_id);
        }
        else if ($postavi == 'izbrisi_igra')
        {

        }
    }
    $igra = zemi_igra_po_id($igra_id);
    $komentari = zemi_komentari_po_id($igra_id);
    include ('info_igra.php');
}
else if ($action == 'igri_search')
{
    $ime = $_POST['ime'];
    $igri = search_igri($ime);
    include ('ispecati_igri_search.php');
}
else if ($action == 'novi_igri')
{
    $zname = 0;
    if (isset($_GET['nova']))
    {
        if ($_GET['nova'] == 'dodadi')
        {
            $id = $_POST['id'];
            $igra = zemi_igra_po_id($id);
            $user = proveri_username($igra['username']);
            if ($user['role'] != 'admin')
            {
                $doAdresa = $user['email'];
                $doIme = $user['username'];
                $odAdresa = "";
                $odIme = 'OcenaIgri';
                $subject = "Ocena Igri-Predlog Igra!";
                $body = '<p>Igrata <strong>' . $igra['igra_ime'] . '</strong> sto ja predlozivte e dodadena na nasata stranica.</p>' . '<p>Vi blagodarime na predlogot.</p>';
                $is_body_html = true;
                try
                {
                    prati_mail($doAdresa, $doIme, $odAdresa, $odIme, $subject, $body, $is_body_html);

                }
                catch(Exception $e)
                {
                    $error = $e->getMessage();
                    include ('../errors/error.php');
                    exit();
                }
            }

            dodadi_igra_admin($igra['igra_ime']);
        }
        else if ($_GET['nova'] == 'izbrisi')
        {
            $Slika = $_POST['Slika'];
            $target_dir = 'images';
            $path = getcwd() . DIRECTORY_SEPARATOR . $target_dir;
            if (!empty($Slika))
            {
                $slika = $path . DIRECTORY_SEPARATOR . $Slika;
                unlink($slika);
            }
            izbrisi_igra_admin($_POST['ime']);
        }
        else if ($_GET['nova'] == 'promeni')
        {
            $zname = 1;
            $ImeIgra = $_POST['ime'];
            $PrvTipIgra = $_POST['PrvTip'];
            $VtorTipIgra = $_POST['VtorTip'];
            $SlikaIgra = $_POST['Slika'];
            include ('promeni_nova_igra.php');
        }
    }
    if (isset($_POST['pom']))
    {
        if ($_POST['pom'] == 'promeni')
        {
            $Ime = $_POST['ime'];
            $StaraSlika = $_POST['staraSlika'];
            $PromenaPrvTip = $_POST['prv_tip'];
            $PromenaVtorTip = $_POST['vtor_tip'];
            $ZnameVtorTip = 0;
            $znameIgra = 0;
            if (!empty($PromenaVtorTip))
            {
                if ($PromenaPrvTip != $PromenaVtorTip)
                {
                    $ZnameVtorTip = 1;
                }
            }
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
                        'jpeg',
                        'jfif'
                    );
                    if (in_array($fileExtLow, $dozvoleniExt))
                    {
                        move_uploaded_file($tmp_name, $name);
                        if ($ZnameVtorTip == 1)
                        {
                            update_igra_admin_slika($Ime, $PromenaPrvTip, $PromenaVtorTip, $filename);
                        }
                        else
                        {
                            update_igra_admin_slika($Ime, $PromenaPrvTip, 0, $filename);
                        }
                        $znameIgra = 1;
                        if (!empty($StaraSlika))
                        {
                            $slika = $path . DIRECTORY_SEPARATOR . $StaraSlika;
                            unlink($slika);
                        }
                    }
                    else
                    {
                        $error = "Недозволен тип на file!Дозволени типови се:jpg,jpeg,png,jfif";
                        include ('../errors/error.php');
                        exit();
                    }
                }
            }
            if ($znameIgra == 0)
            {
                if ($ZnameVtorTip == 1)
                {
                    update_igra_admin($Ime, $PromenaPrvTip, $PromenaVtorTip);
                }
                else
                {
                    update_igra_admin($Ime, $PromenaPrvTip, 0);
                }
            }
        }
    }
    $igri = zemi_novi_igri();
    if ($zname == 0)
    {
        include ('admin_novi_igri.php');
    }
}
?>
