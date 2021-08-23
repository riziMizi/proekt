<?php
require ('../model/database_igri.php');
require('../model/database_tip.php');
if (isset($_POST['action']))
{
    $action = $_POST['action'];
}
else if (isset($_GET['action']))
{
    $action = $_GET['action'];
}
else
{
    $action = 'show_tipovi_igri';
}

if($action=='show_tipovi_igri'){
    $tipovi=zemi_tipovi_igri();
    include('prikazi_tipovi_igri.php');
}


?>
 