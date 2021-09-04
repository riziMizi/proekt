
<?php include '../view/header.php';
$imePrvTip=zemi_ime_na_tip($igra['igra_tip']);
$imeVtorTip=zemi_ime_na_tip($igra['igra_vtor_tip']);
?>

<div id="info_igra_naslov">
<?php if(isset($_SESSION['role'])) : ?>
            <?php if($_SESSION['role']=='admin') :  ?>
    <form action="index.php?action=izbrisi_igra" method="post">
    <input type="hidden" name="igra_id" value="<?php echo $igra['igra_id']; ?>" />
    <input type="hidden" name="igra_slika" value="<?php echo $igra['igra_slika']; ?>" />
    <input id="button_search" type="submit" value="Избриши игра" />
    </form>
    <br>
    <?php endif ;  ?>
    <?php endif ;  ?>


    <h1 id="top10_tekst"><?php echo $igra['igra_ime'] ?></h1>

   

   
    <?php if(!empty($igra['igra_slika'])):?>
<img src="images/<?php echo $igra['igra_slika'] ?>" width="400" height="300">
<?php endif ; ?>
<p >Оцена: <?php echo $igra['igra_ocena'] ?> / 5</p>

    </div>

    <div id="info_igra">
        <p>Жанрови:</p>
<ul>
    <li id="li_tipovi">
<a href="?tip_id=<?php echo $igra['igra_tip'] ?>"><strong><?php echo $imePrvTip['tip_ime']; ?></strong></a>
    </li>

    <?php if($igra['igra_vtor_tip']!=0) : ?>
        <li id="li_tipovi">
        <a href="?tip_id=<?php echo $igra['igra_vtor_tip'] ?>"><strong><?php echo $imeVtorTip['tip_ime']; ?></strong></a>
    </li>
        <?php endif ; ?>

    </ul>
        <br>


<label>Оценете ја играта:</label>
<form  action="index.php?action=info_igra&postavi=ocenka&igra_id=<?php echo $igra['igra_id']; ?>" method="post">
<select id="text_search" name="ocena">
    <option value=""></option>
<?php for($i=1;$i<6;$i++) : ?>
<option  value="<?php echo $i ; ?>">
                <?php echo $i ?>
            </option>

<?php endfor ;  ?>
</select>
<br>

<p>Коментирај:</p>
<textarea id="text_search"  rows="5" cols="40" name="komentar" required></textarea>
<br>
<input id="button_search" type="submit"  value="Коментирај"/>
</form>
<br><br>

<p>Коментари:</p>
</div>

<div id="komentari_div">

<ul>
<?php foreach ($komentari as $kom) : ?>
<div id="kom">
    
    <li> 
        <p><?php echo $kom['komentar'] ?></p>
        <p id="datum"><?php echo $kom['datum'] ?></p>
        <?php if(isset($_SESSION['role'])) : ?>
            <?php if($_SESSION['role']=='admin') :  ?>
        <form action="index.php?action=info_igra&postavi=izbrisi_komentar&igra_id=<?php echo $igra['igra_id']; ?>" method="post">
            <input type="hidden" name="komentar_id" value="<?php echo $kom['id'] ;  ?>" />
            <input id="button_search" type="submit" value="Избриши коментар" />
    </form>
    <?php endif ;  ?>
    <?php endif ;  ?>
    </li>   
    <br>
            </div>
    <?php endforeach; ?>
</ul>

<?php if($komentari->rowCount()<=0):?>
<p>Нема коментари.<p>
    <?php endif ; ?>

            </div>


<?php include '../view/footer.php';?>








