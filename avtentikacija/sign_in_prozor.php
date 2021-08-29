<?php include '../view/header.php';  ?>

<form action="index.php" method="post">
<input type="hidden" name="action" value="login" />
<input type="text" name="username" placeholder="Username"/>
<input type="password" name="password" placeholder="Password"/>
<input type="submit" value="Log In" />
</form>

<?php
if(isset($_GET['error'])){
    if($_GET["error"]=="prazno_pole"){
        echo "<p>Ne gi popolnivte potrebnite polinja! </p>";
    }
    else if($_GET["error"]=="pogresen_vlez"){
        echo "<p>Pogresen Username ili Password! </p>";
    }
}

?>