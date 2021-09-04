<?php include '../view/header.php'; 
$tipovi=zemi_tipovi_igri();
$tipovi1=zemi_tipovi_igri();
?>

<div id="predlozi_igra">
    <h1 id="top10_tekst">Промени игра</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="novi_igri" />
    <input type="hidden" name="pom" value="promeni" />
    <input type="hidden" name="ime" value="<?php echo $ImeIgra  ?>" />
    <input type="hidden" name="staraSlika" value="<?php echo $SlikaIgra  ?>" />
        <h2><?php echo $ImeIgra  ?> </h2>

        <label>Жанрови:</label>
        <select id="text_search" name="prv_tip">
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

        <select id="text_search" name="vtor_tip">  
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
    <br><br>

        <label>Слика:</label>
            <input id="slika" type="file" name="slika" />
            <br><br>

        <label>&nbsp;</label>
        <input id="button_promeni" type="submit" value="Промени игра" />
        <br />  <br />
    </form>

</div>

<?php include '../view/footer.php';?>
