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
                <td><p><?php echo $igra['igra_ocena']; ?></p></td>
            </tr>
            <tr>
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
            <?php endforeach; ?>

</table>
