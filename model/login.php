<?php
require('database.php');
session_start();

//LOG IN

function prazni_polinja_log_in($username,$password){
        $result;
        if(empty($username) || empty($password)){
                $result=true;
        }
        else{
                $result=false;
        }
        return $result;
}



//SIGN UP
function dodadi_user($username,$password,$email,$role){
global $db;
$query="INSERT INTO user(username,password,email,role)
        VALUES(?,?,?,?) ";
$hashPwd=password_hash($password,PASSWORD_DEFAULT);
$db->prepare($query)->execute([$username,$hashPwd,$email,$role]);
}

function proveri_username($username){
        global $db;
        $query="SELECT * FROM user
                WHERE username='$username'";
        $result=$db->query($query);
        $result=$result->fetch();
        return $result;
}

function prazni_polinja_sign_up($username,$email,$password,$password2){
        $result;
if(empty($username) || empty($password) || empty($email) || empty($password2)){
        $result=true;
}else{
        $result=false;
}
        return $result;
}

function nevaliden_email($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result= true;
        }else{
                $result=false;
        }
        return $result;
}

function proveri_password($password,$password2){
$result;
if($password !== $password2){
        $result=true;
}
else{
        $result=false;
}
return $result;
}

function nevaliden_username($username){
        $result;
if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
}else{
        $result=false;
}
return $result;
}

function password_length($password){
        $result;
$pom=strlen($password);
if($pom<=5){
        $result=true;
}else{
        $result=false;
}
return $result;
}

function proveri_cookies(){
        if(isset($_COOKIE['usernameCookie'])){
                unset($_COOKIE['usernameCookie']);
                setcookie('usernameCookie',null,-1);
        }
        if(isset($_COOKIE['emailCookie'])){
                unset($_COOKIE['emailCookie']);
                setcookie('emailCookie',null,-1);
        }
        if(isset($_COOKIE['passwordCookie'])){
                unset($_COOKIE['passwordCookie']);
                setcookie('passwordCookie',null,-1);
        }
        if(isset($_COOKIE['password2Cookie'])){
                unset($_COOKIE['password2Cookie']);
                setcookie('password2Cookie',null,-1);
        }
}




?>

