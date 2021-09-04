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
    proveri_cookies();
    $action = 'otvori_sign_in';
}

if($action=='otvori_sign_in'){
include('sign_in_prozor.php');
}
else if($action=='login')
{
$username=$_POST['username'];
$password=$_POST['password'];
if(prazni_polinja_log_in($username,$password) !== false){
    header("Location: sign_in_prozor.php?error=prazno_pole");
     exit();
}

$user=proveri_username($username);
$userPwd=$user['password'];
$proverka=password_verify($password,$userPwd);
if($proverka==false){
    header("Location: sign_in_prozor.php?error=pogresen_vlez");
     exit();
}else{
    $_SESSION['role']=$user['role'];
    $_SESSION['username']=$username;
    $_SESSION['email']=$user['email'];
    header("Location: ../index.php");
    exit();
}

}
else if($action=='log_out')
{
$_SESSION=array();
session_destroy();
header("Location: ../index.php");
}
else if($action=='otvori_sign_up')
{
    proveri_cookies();

    include('sign_up_prozor.php');
}
else if($action=='sign_up')
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    setcookie('usernameCookie', $username);
    setcookie('emailCookie', $email);
    setcookie('passwordCookie', $password);
    setcookie('password2Cookie', $password2);
    $user="user";
    if(prazni_polinja_sign_up($username,$password,$email,$password2) !== false){
    header("Location: sign_up_prozor.php?error=prazno_pole");
     exit();
    }
    if(nevaliden_username($username) !== false){
        header("Location: sign_up_prozor.php?error=nevaliden_username");
     exit();
    }
    if(nevaliden_email($email) !== false){
        header("Location: sign_up_prozor.php?error=nevaliden_email");
     exit();
    }
    if(proveri_password($password,$password2) !== false){
        header("Location: sign_up_prozor.php?error=pogresen_password");
     exit();
    }
    if(password_length($password) !== false){
        header("Location: sign_up_prozor.php?error=length_password");
     exit();
    }
    $proverkaUsername=proveri_username($username);
    if($proverkaUsername){
       header("Location: sign_up_prozor.php?error=postoecki_username");
       exit();
    }else{
        dodadi_user($username,$password,$email,$user);
            unset($_COOKIE['usernameCookie']);
            setcookie('usernameCookie',null,-1);
        
            unset($_COOKIE['emailCookie']);
            setcookie('emailCookie',null,-1);
    
            unset($_COOKIE['passwordCookie']);
            setcookie('passwordCookie',null,-1);

            unset($_COOKIE['password2Cookie']);
            setcookie('password2Cookie',null,-1);

        header("Location: sign_up_prozor.php?error=uspesno");
        exit();
    }
}


?>