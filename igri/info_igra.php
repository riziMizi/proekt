
<?php include '../view/header.php'?>

    <h1><?php echo $igra['igra_ime'] ?></h1>

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
    </li>   
    <?php endforeach; ?>
</ul>








