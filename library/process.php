<?php 

$mysqli = new mysqli('localhost', 'root', '', 'library');

if ($mysqli->connect_error){
    die('Could not connect to database'. $mysqli->connect_error);
}