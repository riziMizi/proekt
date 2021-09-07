<?php

class Igra {
public $id;
public $ime;
public $slika;
public $ocena;

public function __construct($id,$ime,$slika,$ocena){
    $this->id=$id;
    $this->ime=$ime;
    $this->slika=$slika;
    $this->ocena=$ocena;

}

public function get_id(){
    return $this->id;
}

public function get_ime(){
    return $this->ime;

}

public function get_slika(){
    return $this->slika;
}

public function get_ocena(){
    return $this->ocena;
}

}


?>