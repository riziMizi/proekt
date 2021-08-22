<?php include '../view/header.php'; 
$id=$_GET['tip_id'];
?>
<div >
    <h1>Add Game</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_igra" />

        <input type="hidden" name="tip" value=<?php echo $id ;?>>

        <label>Name:</label>
        <input type="input" name="ime" required />
        <br />

        <label>Picture:</label>
        <input type="file" name="slika" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br />  <br />
    </form>

</div>
