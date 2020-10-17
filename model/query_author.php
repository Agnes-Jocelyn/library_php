<?php

include '../Library/Process.php';

if (isset($_POST['save_author'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $picture = $_POST['picture'];
    mysqli_query($mysqli, "INSERT INTO author (name, address, phone_number,picture) VALUES ('$name', '$address', '$phone_number', '$picture') ") or die(mysqli_error($mysqli));



    header('location: ../View/author/index_author.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id");

    header('location: ../View/author/index_author.php');
}

// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     $update = true;
//     $result = mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id' " );

//     if ($result->num_rows){
//         $row = $result->fetch_array();
//         $name = $_POST['name'];
//         $address = $_POST['address'];
//         $phone_number = $_POST['phone_number'];
//         $picture = $_POST['picture'];
//     }
// }

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $picture = $_POST['picture'];

    mysqli_query($mysqli, "UPDATE author SET name='$name', address='$address', phone_number='$phone_number', picture='$picture' WHERE id='$id' ")
    or die($mysqli->error);

    header('location: ../View/author/index_author.php');
}