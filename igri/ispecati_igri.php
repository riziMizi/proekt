<?php include '../view/header.php';?>

<table>
            <tr>
                <th><?php echo $imeTip['tip_ime']; ?> </th>
            </tr>
            <?php foreach ($igri as $igra) : ?>
            <tr>
                <td><a href="?action=info_igra&igra_id=<?php echo $igra['igra_id']; ?>"><?php echo $igra['igra_ime']; ?></a></td>
            </tr>
            <tr>
                <?php if(!empty($igra['igra_slika'])):?>
                     <td><img src="images/<?php echo $igra['igra_slika'] ?>" width="300" height="200"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
            </tr>
            <tr>
                <td><p>Оцена:<?php echo $igra['igra_ocena']; ?></p></td>
            </tr>
            <?php endforeach; ?>

</table>

<?php if($igri->rowCount()<=0):?>
<p>Нема ниту една игра од овој тип.</p>
    <?php endif ; ?>

    <?php include '../view/footer.php';?>
