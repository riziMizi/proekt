<?php include '../view/header.php'; 
$tipovi=zemi_tipovi_igri();
$tipovi1=zemi_tipovi_igri();
?>
<div >
    <h1>Add Game</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_igra" />

        <label>Name:</label>
        <input type="input" name="ime" required />
        <br />

        <p>Izberete tip na zanr:</p>
        <select name="prv_tip">
        <?php foreach($tipovi as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
        </select>

        <p>Izberete vtor tip na zanr(Opcionalno):</p>
        <select name="vtor_tip">  
            <option value=""></option>
            <?php foreach($tipovi1 as $tip) : ?>
        <option  value="<?php echo $tip['tip_id'] ; ?>">
                <?php echo $tip['tip_ime'] ?>
            </option>
        <?php endforeach ;  ?>
    </select>
    <br />

        <label>Picture:</label>
        <input type="file" name="slika" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Dodadi igra" />
        <br />  <br />
    </form>

</div>
