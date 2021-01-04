<?php

// $mysqli = new mysqli('localhost', 'root', '', 'library');
// include '../library/process.php';
include '../library/process.php';

session_start();

// add data

if (isset($_POST['save_author'])) {
    $target = __DIR__ . '/Images/Authors/';

    $file_extension = ['png', 'jpg', 'jpeg'];
    $image = $_FILES['image']['name'];
    $x = explode('.', $image);
    $extension = strtolower(end($x));

    $image_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $author_description = $_POST['author_description'];

    if (in_array($extension, $file_extension) === true) {
        if ($image_size < 1044070) {
            move_uploaded_file($file_tmp, $target . $image);

            ($query = mysqli_query(
                $mysqli,
                "INSERT INTO author (name, address, phone_number, author_description, image) VALUES ('$name', '$address', '$phone_number', '$author_description', '$image') "
            )) or die(mysqli_error($mysqli));

            if ($query) {
                $_SESSION['message'] = 'New Author Data Has Been Added';
                $_SESSION['msg_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Unable To Add New Author Data';
                $_SESSION['msg_type'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'Image Size Is Too Big';
            $_SESSION['msg_type'] = 'warning';
        }
    } else {
        $_SESSION['message'] = 'Image Extension Is Not Allowed';
        $_SESSION['msg_type'] = 'warning';
    }

    header('location: ../View/author/index_author.php');
}

// delete

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $target = __DIR__ . '/Images/Authors/';

    ($data = $mysqli->query("SELECT image FROM author WHERE id = $id")) or
        die(mysqli_error($mysqli));
    $result = $data->fetch_assoc();
    $author_oldimage = $result['image'];
    unlink($target . $author_oldimage);
    mysqli_query($mysqli, "DELETE FROM author WHERE id=$id") or
        die(mysqli_error($mysqli));

    $_SESSION['message'] = 'Data Succesfully Deleted';
    $_SESSION['msg_type'] = 'warning';

    header('location: ../View/author/index_author.php');
}

// update

if (isset($_POST['update'])) {
    $target = __DIR__ . '/Images/Authors/';
    $file_extension = ['png', 'jpg', 'jpeg'];
    $image = $_FILES['image']['name'];
    $x = explode('.', $image);
    $extension = strtolower(end($x));

    $image_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $author_description = $_POST['author_description'];
    $oldimage = $_POST['oldimage'];

    if (in_array($extension, $file_extension) === true) {
        if ($image_size < 1044070) {
            try {
                move_uploaded_file($file_tmp, $target . $image);
                unlink($target . $oldimage);

                ($query = mysqli_query(
                    $mysqli,
                    "UPDATE author SET name='$name', address='$address', phone_number='$phone_number', author_description='$author_description' ,image='$image' WHERE id='$id' "
                )) or die($mysqli->error);

                if ($query) {
                    $_SESSION['message'] = 'New Author has been added';
                    $_SESSION['msg_type'] = 'success';
                } else {
                    $_SESSION['message'] = 'Failed to upload images';
                    $_SESSION['msg_type'] = 'danger';
                }
            } catch (Exception $e) {
                $_SESSION['message'] = 'Data Has Failed To Be Updated';
                $_SESSION['msg_type'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'Image Size Is Too Big';
            $_SESSION['msg_type'] = 'warning';
        }
    } else {
        $_SESSION['message'] = 'File Extension Is Not Allowed';
        $_SESSION['msg_type'] = 'warning';
    }

    header('location: ../View/author/index_author.php');
}
