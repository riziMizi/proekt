<?php include '../view/header.php';  ?>

<div id="sign_up">
<h1 id="top10_tekst">Регистрирај се</h1>
<form action="index.php" method="post">
<input type="hidden" name="action" value="sign_up" />
<input id="input" type="text" name="username" placeholder="Корисничко име" value="<?php if(isset($_COOKIE['usernameCookie'])) echo $_COOKIE['usernameCookie'] ;?>"/>
<br>
<input id="input" type="text" name="email" placeholder="E-mail" value="<?php if(isset($_COOKIE['emailCookie'])) echo $_COOKIE['emailCookie'] ;?>" />
<br>
<input id="input" type="password" name="password" placeholder="Лозинка" value="<?php if(isset($_COOKIE['passwordCookie'])) echo $_COOKIE['passwordCookie'] ;?>" />
<br>
<input id="input" type="password" name="password2" placeholder="Повторете ја лозинката" value="<?php if(isset($_COOKIE['password2Cookie'])) echo $_COOKIE['password2Cookie'] ;?>" />
<br><br>
<input id="button_search" type="submit"  value="Регистрирај се" />
</form>

<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="prazno_pole"){
        echo "<p>Не ги пополнивте потребните полиња! </p>";
    }
    else if($_GET["error"]=="postoecki_username"){
        echo "<p>Внесовте постоечко корисничко име!</p>";
    }
    else if($_GET["error"]=="nevaliden_email"){
        echo "<p>Внесовте невалиден e-mail!</p>";
    }
    else if($_GET["error"]=="pogresen_password"){
        echo "<p>Лозинките не се поклопуваат!</p>";
    }
    else if($_GET["error"]=="nevaliden_username"){
        echo "<p>Корисничкото име може да се состои само од бројки и букви!</p>";
    }
    else if($_GET["error"]=="length_password"){
        echo "<p>Лозинката мора да се состои од барем 6 карактери!</p>";
    }
    else if($_GET["error"]=="uspesno"){
        echo "<p>Успешно се регистриравте!</p>";
    }
}
?>

<div>