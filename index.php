<?php 
require ('model/database_igri.php');
require('model/login.php');
require('class/klasa_igra.php');
include 'view/header.php';
$top10=zemi_top_10();
?>

<div>

<table id="top_10">
            <tr>
                <th id="top10_tekst"><h2>Топ 10 игри</h2></th>
            </tr>
            <?php foreach ($top10 as $i) : ?>
                <?php $igra= new Igra($i['igra_id'],$i['igra_ime'],$i['igra_slika'],$i['igra_ocena']) ; ?>
            <tr>
                <td id="hover_top_10"><a href="igri/index.php?action=info_igra&igra_id=<?php echo $igra->get_id() ; ?>"><?php echo $igra->get_ime() ; ?></a></td>
            </tr>
            <tr>
                <?php if(!empty($igra->get_slika())):?>
                     <td><img src="igri/images/<?php echo $igra->get_slika() ; ?>" width="400" height="300"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
            </tr>
            <tr>
                <td id="ocena_top_10"><p>Оцена: <?php echo $igra->get_ocena() ; ?> / 5</p></td>
                
            </tr>
            <?php endforeach; ?>

</table>
</div>
<?php include 'view/footer.php'; ?>
       

