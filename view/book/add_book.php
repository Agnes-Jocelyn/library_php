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
    <?php include_once '../Layout/Navbar.php'; ?>

    <!-- content -->
    <div class="container mt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style=" padding:25px;">
                    <h5 class="card-title">Insert Book Data Here</h5>
                    <form action="../../model/query_book.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" >
                        </div>
                        <div class=" form-group">
                            <label> Author</label>
                            <select name="author" id="author" class="form-control" >
                                <option disabled selected>Choose Author</option>
                                <?php
                                include '../../Library/Process.php';
                                ($sql = mysqli_query(
                                    $mysqli,
                                    'SELECT * FROM author'
                                )) or die($mysqli->error);
                                while ($data = $sql->fetch_assoc()): ?>
                                    <option value="<?= $data[
                                        'id'
                                    ] ?>"><?= $data['name'] ?></option>
                                <?php endwhile;
                                ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label> Publisher</label>
                            <input type="text" class="form-control" name="publisher" placeholder="Enter publisher" >
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter book description" >
                        </div>
                        <div class="form-group">
                            <label> Picture</label>
                            <input type="file" class="form-control" name="picture" placeholder="Enter book picture" >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block" name="save_book">Add new book</button>
                        </div>
                    </form>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>