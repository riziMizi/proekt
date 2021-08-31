<?php include '../view/header.php';?>

<a href="../index.php">Vrati se na pocetna.</a>

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
                <td><p><?php echo $igra['igra_ocena']; ?></p></td>
            </tr>
            <?php endforeach; ?>

</table>
