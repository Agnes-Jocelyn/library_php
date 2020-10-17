<?php

include '../Library/Process.php';

if (isset($_POST['save_book'])) {
    $target = __DIR__ . "/Images/Books/";

    // check the file extension
    $file_extension = array('png', 'jpg', 'jpeg');
    // the data name
    $picture = $_FILES['picture']['name'];
    // get the file extension
    $x = explode('.', $picture);
    $extension = strtolower(end($x));
    // check images size
    $image_size = $_FILES['picture']['size'];
    $file_tmp = $_FILES['picture']['tmp_name'];
    
    // get other data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];

    if(in_array($extension, $file_extension) === true)
    {
        if($image_size < 1044070){ 
            // move file to folder image
            move_uploaded_file($file_tmp, $target . $picture);

            // insert data to DB
            $query = mysqli_query( $mysqli, "INSERT INTO book (title, id_author, publisher, description, picture ) VALUES ('$title', '$author', '$publisher' , '$description', '$picture') ") 
            or die(mysqli_error($mysqli));
            
            if($query){
                $_SESSION['message'] = 'New book has been added';
                $_SESSION['msg_type'] = 'success';
            }else{
                $_SESSION['message'] = 'Failed to add new book';
                $_SESSION['msg_type'] = 'danger';
            }

        }else{
            $_SESSION['message'] = 'Images Size too big';
            $_SESSION['msg_type'] = 'warning';
        }
    }else{
        $_SESSION['message']  = 'File extension is not allowed';
        $_SESSION['msg_type'] = 'warning';
    }

    header('location: ../View/book/index_book.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id");

    header('location: ../View/book/index_book.php');
}

if(isset($_POST['update_book'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $description = $_POST['description'];
    $picture = $_POST['picture'];

    mysqli_query($mysqli, "UPDATE book SET title='$title', id_author='$author', publisher='$publisher', description='$description', picture='$picture' WHERE id='$id' ")
    or die($mysqli->error);

    header('location: ../View/book/index_book.php');
}

