<?php

class Pencilbox {

    public $name="Pencilbox Training";
    public $city="Dhaka";
    public $country="Bangladesh";

    function add() {
        echo 'In add';
    }

    function sub() {
        echo 'In sub';
    }

    function rem() {
        echo 'In rem';
    } 


}

    //echo $name;
    //add();

$a = new Pencilbox;
echo $a->name;









?>