<?php include '../view/header.php'; 

 $tipovi=zemi_tipovi_igri();
 $tipovi1=zemi_tipovi_igri();
?>
<div >
    <h1>Предложи игра</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_igra" />

        <label>Име:</label>
        <input type="input" name="ime" required />
        <br />
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='igrata_postoi'){
                echo "<p>Igrata sto ja vnesovte veke e postavena na stranata! </p>";
            }else if($_GET['error']=='igrata_predlozena'){
                echo "<p>Igrata sto ja vnesovte e veke predlozena!</p>"; 
            }
        }
        ?>

        <p>Изберете тип на играта:</p>
        <select name="prv_tip">
        <?php foreach($tipovi as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
        </select>

        <p>Изберете втор тип на играта(Опционално):</p>
        <select name="vtor_tip">  
            <option value=""></option>
            <?php foreach($tipovi1 as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
    </select>
    <br />

        <label>Слика:</label>
        <input type="file" name="slika" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Предложи" />
        <br />  <br />
    </form>
</div>
<?php
     if(isset($_GET['error'])){
         if($_GET['error']=='uspesno_predlozena'){
            echo "<p>Ви благодариме на предлогот! </p>";
         }

     }
?>
