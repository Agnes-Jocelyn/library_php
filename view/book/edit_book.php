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

    <!-- content -->
    <?php require_once '../../library/process.php';
    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM book WHERE id='$id'");
    while ($book = $data->fetch_assoc()) : ?>

    <div class="container mt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style=" padding:25px;">
                    <h5 class="card-title">Edit Book Data Here</h5>
                    <form action="../../Model/Query_book.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" value="<?php echo $book['title']; ?>">
                        </div>
                        <div class=" form-group">
                            <label> Author</label>
                            <select name="author" id="author" class="form-control" >
                                <option disabled selected>Choose Author</option>
                                <?php require_once '../../library/process.php';
                                ($sql = mysqli_query(
                                    $mysqli,
                                    'SELECT * FROM author'
                                )) or die($mysqli->error);
                                while ($author = $sql->fetch_assoc()): ?>
                                    <option value="<?= $author[
                                        'id'
                                    ] ?>"><?= $author['name'] ?></option>
                                <?php endwhile;
                                ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label> Publisher</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Enter publisher" value="<?php echo $book['publisher']; ?>">
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter book description" value="<?php echo $book['description']; ?>">
                        </div>
                        <div class="form-group">
                            <label> Picture</label>
                            <input type="text" class="form-control" name="picture" placeholder="Enter book picture" value="<?php echo $book['picture']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="update_book">Add new book</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>