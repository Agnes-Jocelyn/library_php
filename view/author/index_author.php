<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index_author.php">Author <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../book/index_book.php">Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- button -->
    <div class="container mt-4">
        <a href="add_author.php" class="btn btn-info ml-3">Add Author</a>

    <div class="row">
            <?php
        include '../../Library/Process.php';
        $no = 1;
        ($list_author = mysqli_query($mysqli, 'SELECT * FROM author')) or
            die($mysqli->error);
        while ($author_row = $list_author->fetch_assoc()): ?>

            <div class="col-md-4" >
                <div class="card mx-auto mt-4"  style="width: 20rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $author_row['name']; ?></h5>
                       <p class="card-text">Address : <?php echo $author_row['address']; ?> </p>
                       <p class="card-text">Phone Number : <?php echo $author_row['phone_number']; ?> </p>
                        <a href="edit_author.php?id=<?php echo $author_row['id']; ?>" class="btn btn-warning btn-block ">Edit</a>
                        <a href="../../model/query_author.php?delete=<?php echo $author_row['id']; ?>" class="btn btn-danger btn-block">Delete</a>
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