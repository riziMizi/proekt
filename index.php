<?php 
require ('model/database_igri.php');
require('model/login.php');
include 'view/header.php';
$top10=zemi_top_10();
?>

<div>

<table id="top_10">
            <tr>
                <th id="top10_tekst"><h2>Топ 10 игри</h2></th>
            </tr>
            <?php foreach ($top10 as $igra) : ?>
            <tr>
                <td id="hover_top_10"><a href="igri/index.php?action=info_igra&igra_id=<?php echo $igra['igra_id']; ?>"><?php echo $igra['igra_ime']; ?></a></td>
            </tr>
            <tr>
                <?php if(!empty($igra['igra_slika'])):?>
                     <td><img src="igri/images/<?php echo $igra['igra_slika'] ?>" width="350" height="250"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
            </tr>
            <tr>
                <td id="ocena_top_10"><p>Оцена: <?php echo $igra['igra_ocena']; ?> / 5</p></td>
                
            </tr>
            <?php endforeach; ?>

</table>
</div>
<?php include 'view/footer.php'; ?>
       

