
<?php include '../view/header.php';
$imePrvTip=zemi_ime_na_tip($igra['igra_tip']);
$imeVtorTip=zemi_ime_na_tip($igra['igra_vtor_tip']);
?>

<a href="../index.php">Vrati se na pocetna.</a>

    <h1><?php echo $igra['igra_ime'] ?></h1>

    <?php if(isset($_SESSION['role'])) : ?>
            <?php if($_SESSION['role']=='admin') :  ?>
    <form action="index.php?action=izbrisi_igra" method="post">
    <input type="hidden" name="igra_id" value="<?php echo $igra['igra_id']; ?>" />
    <input type="hidden" name="igra_slika" value="<?php echo $igra['igra_slika']; ?>" />
    <input type="submit" value="Izbrisi igra" />
    </form>

    <?php endif ;  ?>
    <?php endif ;  ?>

    <a href="?tip_id=<?php echo $igra['igra_tip'] ?>">Otvori lista na <?php echo $imePrvTip['tip_ime']; ?> igri.</a>

    <?php if($igra['igra_vtor_tip']!=0) : ?>
        <a href="?tip_id=<?php echo $igra['igra_vtor_tip'] ?>">Otvori lista na <?php echo $imeVtorTip['tip_ime']; ?> igri.</a>
        <?php endif ; ?>

    <?php if(!empty($igra['igra_slika'])):?>
<img src="images/<?php echo $igra['igra_slika'] ?>" width="300" height="200">
<?php endif ; ?>
<p>Ocena:<?php echo $igra['igra_ocena'] ?></p>


<p>Ocenete ja igrata:</p>
<form  action="index.php?action=info_igra&postavi=ocenka&igra_id=<?php echo $igra['igra_id']; ?>" method="post">
<select name="ocena">
    <option value=""></option>
<?php for($i=1;$i<6;$i++) : ?>
<option  value="<?php echo $i ; ?>">
                <?php echo $i ?>
            </option>

<?php endfor ;  ?>
</select>

<p>Komentiraj:</p>
<textarea  rows="10" cols="20" name="komentar" required></textarea>
<input type="submit"  value="Komentiraj"/>
</form>

<ul>
<?php foreach ($komentari as $kom) : ?>

    <li> 
        <p><?php echo $kom['komentar'] ?></p>
        <?php if(isset($_SESSION['role'])) : ?>
            <?php if($_SESSION['role']=='admin') :  ?>
        <form action="index.php?action=info_igra&postavi=izbrisi_komentar&igra_id=<?php echo $igra['igra_id']; ?>" method="post">
            <input type="hidden" name="komentar_id" value="<?php echo $kom['id'] ;  ?>" />
            <input type="submit" value="Izbrisi komentar" />
    </form>
    <?php endif ;  ?>
    <?php endif ;  ?>
    </li>   
    <?php endforeach; ?>
</ul>








