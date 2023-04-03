<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$con = mysqli_connect("localhost", "root", "root", "twitter-clone-project");

if(!$con)
{
    die("Probeer nog eens....");

}


