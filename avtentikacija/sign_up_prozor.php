<?php include '../view/header.php';  ?>


<form action="index.php" method="post">
<input type="hidden" name="action" value="sign_up" />
<input type="text" name="username" placeholder="Username"/>
<input type="text" name="email" placeholder="E-mail"/>
<input type="password" name="password" placeholder="Password"/>
<input type="password" name="password2" placeholder="Repeat password"/>
<input type="submit"  value="Sign Up" />
</form>

<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="prazno_pole"){
        echo "<p>Ne gi popolnivte potrebnite polinja! </p>";
    }
    else if($_GET["error"]=="postoecki_username"){
        echo "<p>Vnesovte postoecko korisnicko ime!</p>";
    }
    else if($_GET["error"]=="nevaliden_email"){
        echo "<p>Vnesovte nevaliden email!</p>";
    }
    else if($_GET["error"]=="pogresen_password"){
        echo "<p>Lozinkite ne se poklopuvaat!</p>";
    }
    else if($_GET["error"]=="uspesno"){
        echo "<p>Uspesno kreiravte account!</p>";
    }
}
?>