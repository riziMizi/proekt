<?php include '../view/header.php';?>

<div id="nova_igra">
<?php foreach($igri as $igra) :  ?>
<?php $PrvtipIme=zemi_ime_na_tip($igra['igra_tip']); ?>
    <h2 id="top10_tekst" ><?php echo $igra['igra_ime'] ; ?></h2>
    <p>Жанр на играта: <?php echo $PrvtipIme['tip_ime'] ;?></p>
    <?php if(($igra['igra_vtor_tip'])!=0) : ?>
    <?php  $VtortipIme=zemi_ime_na_tip($igra['igra_vtor_tip']); ?> 
    <p>Втор жанр на играта: <?php echo $VtortipIme['tip_ime']  ; ?></p> 
    <?php endif ;?>
    <?php if(!empty($igra['igra_slika'])):?>
<img src="images/<?php echo $igra['igra_slika'] ?>" width="400" height="300">
<br><br>
<?php else : ?>
    <p>Слика: / </p> 
<?php endif ; ?>
<form action="index.php?nova=dodadi" method="post">
    <input type="hidden" name="action" value="novi_igri" />
    <input type="hidden" name="id" value="<?php echo $igra['igra_id'] ;  ?>" />
    <input id="button_search" type="submit" value="Додади" />
</form>
<form action="index.php?nova=izbrisi" method="post">
<input type="hidden" name="action" value="novi_igri" />
<input type="hidden" name="ime" value="<?php echo $igra['igra_ime'] ;  ?>" />
<input id="button_search" type="submit" value="Избриши" />
</form>
<form action="index.php?nova=promeni" method="post">
<input type="hidden" name="action" value="novi_igri">
<input type="hidden" name="ime" value="<?php echo $igra['igra_ime'] ;  ?>" />
<input type="hidden" name="PrvTip" value="<?php echo $igra['igra_tip'] ;  ?>" />
<input type="hidden" name="VtorTip" value="<?php echo $igra['igra_vtor_tip'] ;  ?>" />
<input type="hidden" name="Slika" value="<?php echo $igra['igra_slika'] ;  ?>" />
<input id="button_search" type="submit" value="Промени">
</form>
<p id="border"></p>
 <?php  endforeach ; ?>

</div>

 <?php if($igri->rowCount()<=0):?>
<h3 id="greska">Нема нови игри.</h3>
    <?php endif ; ?>

    <?php include '../view/footer.php';?>

    