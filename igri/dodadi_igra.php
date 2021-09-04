<?php include '../view/header.php'; 

 $tipovi=zemi_tipovi_igri();
 $tipovi1=zemi_tipovi_igri();
?>
<div id="predlozi_igra" >
    <h1 id="top10_tekst">Предложи игра</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_igra" />

        <label>Име:</label>
        <input  id="text_search" type="input" name="ime" required />
        <br>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='igrata_postoi'){
                echo "<p>Играта што ја внесовте е веќе поставена на страната! </p>";
            }else if($_GET['error']=='igrata_predlozena'){
                echo "<p>Играта што ја внесовте е веќе предложена!</p>"; 
            }
        }
        ?>
        <br>

        <label>Жанр на играта:</label>
        <select  id="text_search" name="prv_tip">
        <?php foreach($tipovi as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
        </select>
        

        <select id="text_search" name="vtor_tip">  
            <option value=""></option>
            <?php foreach($tipovi1 as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
    </select>
    <p id="opcionalno">(Опционално)</p>
    <br><br>

        <label>Слика:</label>
        <input  id="slika" type="file" name="slika" />
        <br><br>

        <label>&nbsp;</label>
        <input id="button_predlozi" type="submit" value="Предложи" />
        <br />  <br />
    </form>
</div>
<div id="uspesno_predlozena">
<?php
     if(isset($_GET['error'])){
         if($_GET['error']=='uspesno_predlozena'){
            echo "<h2>Ви благодариме на предлогот! </h2>";
         }

     }
?>
</div>

<?php include '../view/footer.php';?>
