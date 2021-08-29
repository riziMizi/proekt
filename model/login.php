<?php
require('database.php');
session_start();

//LOG IN
function proveri_login($username,$password){
global $db;
$query="SELECT * FROM user
        WHERE username='$username' AND password='$password'";
$result=$db->query($query);
$result=$result->fetch();
return $result;
}

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
$db->prepare($query)->execute([$username,$password,$email,$role]);
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




?>

