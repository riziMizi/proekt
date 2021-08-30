<?php include 'view/header.php';
require ('model/database_igri.php');
require('model/login.php');
$top10=zemi_top_10();
?>

<div>
<?php if(isset($_SESSION['username'])) :  ?>
    <?php if($_SESSION['role']=="admin") :  ?>
    <a href="igri/index.php?action=novi_igri">Novi Igri</a>
    <?php endif ;  ?>
<a href="igri/index.php?action=show_add_igra">Dodadi igra</a>
<?php endif ;  ?>
<a href="tipovi_igri/index.php">Prikazi tipovi na igri</a>
<form action="igri/index.php?action=igri_search" method="post">
<input type="input" name="ime" placeholder="Vnesete ime na igra" required />
<input type="submit" value="Prebaraj" />
</form>
<?php if(isset($_SESSION['username'])) :  ?>
    <?php if(isset($_GET['najava'])): ?>
        <?php if($_GET['najava']=="uspesna") : ?>
    <p>Uspesna najava <?php echo $_SESSION['username']?></p>
    <?php endif ;  ?>
    <?php endif ;  ?>
    <a href="avtentikacija/index.php?action=log_out">Log Out</a> 
<?php else :  ?>
    <a href="avtentikacija/index.php">Log In</a>
    <a href="avtentikacija/index.php?action=otvori_sign_up">Sign Up</a> 
<?php endif ;  ?>
</div>

<div>

<table>
            <tr>
                <th>Top 10</th>
            </tr>
            <?php foreach ($top10 as $igra) : ?>
            <tr>
                <td><a href="igri/index.php?action=info_igra&igra_id=<?php echo $igra['igra_id']; ?>"><?php echo $igra['igra_ime']; ?></a></td>
            </tr>
            <tr>
                <?php if(!empty($igra['igra_slika'])):?>
                     <td><img src="igri/images/<?php echo $igra['igra_slika'] ?>" width="300" height="200"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
            </tr>
            <tr>
                <td><p><?php echo $igra['igra_ocena']; ?></p></td>
            </tr>
            
            <?php endforeach; ?>

</table>
</div>
       

