<?php include '../view/header.php';
$tip='';
?>

<table>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Slika</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($igri as $igra) : ?>
            <tr>
                <td><?php echo $igra['igra_id']; ?></td>
                <td><a href="?action=info_igra&igra_id=<?php echo $igra['igra_id']; ?>"><?php echo $igra['igra_ime']; ?></a></td>
                <?php if(!empty($igra['igra_slika'])):?>
                     <td><img src="images/<?php echo $igra['igra_slika'] ?>" width="300" height="200"></td>
                <?php else : ?>
                     <td></td>
                <?php endif ; ?>
                <td>
        <form action="." method="post"> 
                    <input type="hidden" name="action"
                           value="delete_igra" />
                    <input type="hidden" name="igra_id"
                           value="<?php echo $igra['igra_id']; ?>" />
                     <input type="hidden" name="igra_tip"
                           value="<?php echo $igra['igra_tip']; ?>" />
                           <input type="hidden" name="igra_slika"
                           value="<?php echo $igra['igra_slika']; ?>" />
                    <input type="submit" value="Delete" />
                </form>
        </td>
            </tr>
            <?php $tip=$igra['igra_tip'] ; ?>
            <?php endforeach; ?>

</table>

<p><a href="?action=show_add_igra&tip_id=<?php echo $tip ;?>">Add Game</a></p>