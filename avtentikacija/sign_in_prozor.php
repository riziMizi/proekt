<?php include '../view/header.php';  ?>

<form action="index.php" method="post">
<input type="hidden" name="action" value="login" />
<input type="text" name="username" placeholder="Корисничко име"/>
<input type="password" name="password" placeholder="Лозинка"/>
<input type="submit" value="Најави се" />
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