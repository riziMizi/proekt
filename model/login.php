<?php
require('database.php');

function proveri_login($username,$password){
global $db;
$query="SELECT * FROM user
        WHERE username='$username' AND password='$password'";
$result=$db->query($query);
$result=$result->fetch();
return $result;
}

function dodadi_user($username,$password,$role){
global $db;
$query="INSERT INTO user(username,password,role)
        VALUES('$username','$password','$role') ";
$db->exec($query);
}

function proveri_username($username){
        global $db;
        $query="SELECT * FROM user
                WHERE username='$username'";
        $result=$db->query($query);
        $result=$result->fetch();
        return $result;
}




?>

