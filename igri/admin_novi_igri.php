<?php include '../view/header.php';?>

<a href="../index.php">Vrati se na pocetna.</a>

<?php foreach($igri as $igra) :  ?>
<?php $PrvtipIme=zemi_ime_na_tip($igra['igra_tip']); ?>
    <p>Ime na igrata: <?php echo $igra['igra_ime'] ; ?></p>
    <p>Prv tip na igrata: <?php echo $PrvtipIme['tip_ime'] ;?></p>
    <?php if(($igra['igra_vtor_tip'])!=0) : ?>
    <?php  $VtortipIme=zemi_ime_na_tip($igra['igra_vtor_tip']); ?> 
    <p>Vtor tip na igrata: <?php echo $VtortipIme['tip_ime']  ; ?></p>
    <?php else : ?>
        <p>Vtor tip na igrata:/</p>  
    <?php endif ;?>
    <?php if(!empty($igra['igra_slika'])):?>
<p>Slika: </p><img src="images/<?php echo $igra['igra_slika'] ?>" width="300" height="200">
<?php else : ?>
    <p>Slika: / </p> 
<?php endif ; ?>
<form action="index.php?nova=dodadi" method="post">
    <input type="hidden" name="action" value="novi_igri" />
    <input type="hidden" name="id" value="<?php echo $igra['igra_id'] ;  ?>" />
    <input type="submit" value="Dodadi" />
</form>
<form action="index.php?nova=izbrisi" method="post">
<input type="hidden" name="action" value="novi_igri" />
<input type="hidden" name="ime" value="<?php echo $igra['igra_ime'] ;  ?>" />
<input type="submit" value="Izbrisi" />
</form>
<form action="index.php?nova=promeni" method="post">
<input type="hidden" name="action" value="novi_igri">
<input type="hidden" name="ime" value="<?php echo $igra['igra_ime'] ;  ?>" />
<input type="hidden" name="PrvTip" value="<?php echo $igra['igra_tip'] ;  ?>" />
<input type="hidden" name="VtorTip" value="<?php echo $igra['igra_vtor_tip'] ;  ?>" />
<input type="hidden" name="Slika" value="<?php echo $igra['igra_slika'] ;  ?>" />
<input type="submit" value="Promeni">
</form>
<hr>

 <?php  endforeach ; ?>

 <?php if($igri->rowCount()<=0):?>
<p>Nema novi igri.</p>
    <?php endif ; ?>

    