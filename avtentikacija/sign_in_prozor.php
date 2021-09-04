<?php include '../view/header.php';  ?>

<div id="sign_up">
<h1 id="top10_tekst">Најави се</h1>
<form action="index.php" method="post">
<input type="hidden" name="action" value="login" />
<input id="input" type="text" name="username" placeholder="Корисничко име"/>
<br>
<input id="input" type="password" name="password" placeholder="Лозинка"/>
<br><br>
<input id="button_search" type="submit" value="Најави се" />
</form>

<?php
if(isset($_GET['error'])){
    if($_GET["error"]=="prazno_pole"){
        echo "<p>Не ги пополнивте потребните полиња! </p>";
    }
    else if($_GET["error"]=="pogresen_vlez"){
        echo "<p>Погрешно корисничко име или лозинка! </p>";
    }
}

?>

</div>