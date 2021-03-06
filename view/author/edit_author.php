<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <?php include_once '../Layout/Navbar.php'; ?>

    <!-- content -->
    <?php
    require_once '../../library/process.php';
    $id = $_GET['id'];
    $data = mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id'");
    while ($author = $data->fetch_assoc()): ?>

    <div class="container mt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card" style="width: auto; padding:20px;">
                    <h5 class="card-title">Edit Author Data Here</h5>
                    <form action="../../Model/query_author.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $author['id'] ?>">
                        <div class="form-group">
                            <label> Author Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter author name" value="<?php echo $author[
                                'name'
                            ]; ?>" >
                        </div>
                        <div class=" form-group">
                            <label> Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Enter author address" value="<?php echo $author[
                                'address'
                            ]; ?>">
                        </div>
                        <div class="form-group">
                            <label> Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Enter author phone number" value="<?php echo $author[
                                'phone_number'
                            ]; ?>" >
                        </div>
                        <div class="form-group">
                            <label> About Author</label>
                            <input type="text" class="form-control" name="author_description" placeholder="Enter author description" value="<?php echo $author[
                                'author_description'
                            ]; ?>" >
                        </div>
                        <div class="form-group">
                            <label> Picture</label>
                            <input type="hidden" name="oldimage" value="<?php echo $author[
                                'image'
                            ]; ?>">
                            <input type="file" class="form-control" name="image" placeholder="Enter picture" value="<?php echo $author[
                                'image'
                            ]; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endwhile;
    ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>