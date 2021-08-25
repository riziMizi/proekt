<?php 
require ('../model/login.php');
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
    $action = 'otvori_sign_in';
}

if($action=='otvori_sign_in'){
include('sign_in_prozor.php');
}
else if($action=='login')
{
$username=$_POST['username'];
$password=$_POST['password'];
$user=proveri_login($username,$password);
if($user==false){
    $error="Pogresen Username ili Password!";
    include('../errors/error.php');
}else{
    $pom=proveri_username($username);
    $_SESSION['role']=$pom['role'];
    $_SESSION['username']=$username;
    header("Location: ../index.php");
 echo '<script>alert("Uspesno se najavivte!");</script>';
}

}
else if($action=='log_out')
{
$_SESSION=array();
session_destroy();
header("Location: ../index.php");
echo '<script>alert("Uspesno se odjavivte od sesijata!");</script>';
}
else if($action=='otvori_sign_up')
{
    include('sign_up_prozor.php');
}
else if($action=='sign_up')
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user="user";
    $proverkaUsername=proveri_username($username);
    if($proverkaUsername){
        $error="Username-ot sto go izbravte postoi!";
    include('../errors/error.php');

    }else{
        dodadi_user($username,$password,$user);
        header("Location: ../index.php");
        echo '<script>alert("Uspesno go kreiravtre account-ot!");</script>';
    }

}


?>