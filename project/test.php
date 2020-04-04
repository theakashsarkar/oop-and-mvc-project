<?php
include 'include/del/base.php';
include 'include/del/city.php';
include "include/del/country.php";

$cnt = new country();
$cnt->id = 12;
$cnt->SelectById();
print $cnt->id.":".$cnt->name;

// $ct = new city();
// $ct -> id = 1;
// $ct ->SelectById();