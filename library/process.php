<?php 

// $mysqli = new mysqli('localhost', 'root', '', 'library');

// if ($mysqli->connect_error){
//     die('Could not connect to database'. $mysqli->connect_error);
// }

 try {
     $mysqli = new mysqli('localhost', 'root', '', 'library');

 } catch (Exception $e) {
     echo "Failed to connect to Database, error messages : " . $e->getMessage();
 }