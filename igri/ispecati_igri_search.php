<?php include '../view/header.php' ?>

<table id="top_10">
            <tr>
                <th id="top10_tekst"><h3><?php echo $ime ?></h3> </th>
            </tr>
            <?php foreach ($igri as $igra) : ?>
            <tr>
                <td id="hover_top_10"><a href="?action=info_igra&igra_id=<?php echo $igra['igra_id']; ?>"><?php echo $igra['igra_ime']; ?></a></td>
            </tr>
            <tr>
                <?php if(!empty($igra['igra_slika'])):?>
                     <td><img src="images/<?php echo $igra['igra_slika'] ?>" width="400" height="300"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
            </tr>
            <tr>
                <td id="ocena_top_10"><p>Оцена: <?php echo $igra['igra_ocena']; ?> / 5</p></td>
            </tr>
            <?php endforeach; ?>

</table>

<?php if($igri->rowCount()<=0):?>
<h3 id="greska">Нема ниту една игра со слично име.</h3>
    <?php endif ; ?>

    <?php include '../view/footer.php';?>
