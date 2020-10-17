<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../author/index_author.php">Author <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_book.php">Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <a href="add_book.php" class="btn btn-info ml-3">Add Book</a>
        <div class="row">
        <?php
            require_once '../../Library/Process.php';
            ($list_book = mysqli_query(
                $mysqli,
                'SELECT * FROM author JOIN book ON author.id = book.id_author ORDER BY book.id ASC'
            )) or die($mysqli->error);
            while ($book_row = $list_book->fetch_array()): 
            ?>
            <div class="col-md-4" >
                <div class="card mx-auto mt-4"  style="width: 20rem;">
                    <img src="<?php echo '../../model/Images/Books/'.$book_row['picture']; ?> " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book_row['title']; ?></h5>
                       <p class="card-text">Author : <?php echo $book_row['name']; ?> </p>
                       <p class="card-text">Publisher : <?php echo $book_row['publisher']; ?> </p>
                       <p class="card-text">Description : <?php echo $book_row['description']; ?> </p>
                        <a href="edit_book.php?id=<?php echo $book_row['id']; ?>" class="btn btn-warning btn-block ">Edit</a>
                        <a href="../../model/query_book.php?delete=<?php echo $book_row['id']; ?>" class="btn btn-danger btn-block">Delete</a>
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