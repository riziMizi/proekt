<?php include '../view/header.php';  ?>

<div id="sign_up">
<h1 id="top10_tekst">Најави се</h1>
<form action="index.php" method="post">
<input type="hidden" name="action" value="login" />
<input id="input" type="text" name="username" placeholder="Корисничко име" value="<?php if(isset($_COOKIE['usernameNajavaCookie'])) echo $_COOKIE['usernameNajavaCookie'] ;?>"/>
<br>
<input id="input" type="password" name="password" placeholder="Лозинка" value="<?php if(isset($_COOKIE['passwordNajavaCookie'])) echo $_COOKIE['passwordNajavaCookie'] ;?>"/>
<br><br>
<?php if(isset($_COOKIE['usernameNajavaCookie'])) : ?>
<input type="checkbox" name="zapamti_user" checked  />
<?php else :   ?>
    <input type="checkbox" name="zapamti_user" />
    <?php endif ;  ?>
<label for="zapamti_user">Зачувај корисник</label>
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