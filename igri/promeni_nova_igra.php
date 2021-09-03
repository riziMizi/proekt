<?php include '../view/header.php'; 
$tipovi=zemi_tipovi_igri();
$tipovi1=zemi_tipovi_igri();
?>

<div >
    <h1>Промени игра</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="novi_igri" />
    <input type="hidden" name="pom" value="promeni" />
    <input type="hidden" name="ime" value="<?php echo $ImeIgra  ?>" />
    <input type="hidden" name="staraSlika" value="<?php echo $SlikaIgra  ?>" />
        <label>Име:</label>
        <p><?php echo $ImeIgra  ?> </p>

        <p>Прв тип:</p>
        <select name="prv_tip">
        <?php foreach($tipovi as $tip) : ?>
            <?php if($tip['tip_id']==$PrvTipIgra) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>" selected>
                <?php echo $tip['tip_ime'] ?>
            </option>
            <?php else :  ?>
                <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
            <?php endif ;  ?>    
        <?php endforeach ;  ?>
        </select>

        <p>Втор тип:</p>
        <select name="vtor_tip">  
            <option value=""></option>
            <?php foreach($tipovi1 as $tip) : ?>
                <?php if($tip['tip_id']==$VtorTipIgra) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>" selected>
                <?php echo $tip['tip_ime'] ?>
            </option>
            <?php else :  ?>
                <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
            <?php endif ;  ?>   
        <?php endforeach ;  ?>
    </select>
    <br />

        <label>Слика:</label>
            <input type="file" name="slika" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Промени игра" />
        <br />  <br />
    </form>

</div>
