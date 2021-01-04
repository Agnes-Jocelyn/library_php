<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../library/Style/style.css">
</head>

<body>
    <!-- nav -->
    <?php include_once '../Layout/Navbar.php'; ?>

    <div class="container mt-4">
        <a href="add_book.php" class="btn btn-info ml-3">Add Book</a>
        <div class="row">
        <?php
        require_once '../../Library/Process.php';
        ($list_book = mysqli_query(
            $mysqli,
            'SELECT * FROM author JOIN book ON author.id = book.id_author ORDER BY book.id ASC'
        )) or die($mysqli->error);
        while ($book_row = $list_book->fetch_array()): ?>
            <div class="col-md-4" >
                <div class="card mx-auto mt-4"  style="width: 18rem;">
                    <img src="<?php echo '../../model/Images/Books/' .
                        $book_row[
                            'picture'
                        ]; ?> " class="card-img-top img" alt="...">
                    <div class="card-body">
                        <a href="book_detail.php?detail=<?php echo $book_row[
                            'id'
                        ]; ?> "><h5 class="card-title"><?php echo $book_row[
     'title'
 ]; ?></h5></a>
                       <p class="card-text">Author : <?php echo $book_row[
                           'name'
                       ]; ?> </p>
                        <a href="edit_book.php?id=<?php echo $book_row[
                            'id'
                        ]; ?>" class="btn btn-warning btn-block ">Edit</a>
                        <a href="../../model/query_book.php?delete=<?php echo $book_row[
                            'id'
                        ]; ?>" class="btn btn-danger btn-block">Delete</a>
                    </div>
                </div>
            </div>
            
            <?php endwhile;
        ?>
    </div>

    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>