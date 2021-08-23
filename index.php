<?php include 'view/header.php';
require ('model/database_igri.php');
$top10=zemi_top_10();
?>

<div>
<a href="igri/index.php?action=show_add_igra">Dodadi igra</a>
<a href="tipovi_igri/index.php?action=show_tipovi_igri">Prikazi tipovi na igri</a>
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
       

