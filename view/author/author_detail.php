<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
    <link rel="stylesheet" href="../../library/Style/Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- nav -->
    <?php include_once '../Layout/Navbar.php'; ?>

    <!-- content -->
    <?php
    require_once '../../library/process.php';
    $id = $_GET['author'];
    ($data = mysqli_query($mysqli, "SELECT * FROM author WHERE id='$id'")) or
        die(mysqli_error($mysqli));
    while ($author_detail = $data->fetch_assoc()): ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="card mb-3" style="max-width: auto; max-height: auto;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?php echo '../../model/Images/Authors/' .
                        $author_detail[
                            'image'
                        ]; ?> " class="card-img-top img-detail" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $author_detail[
                        'name'
                    ]; ?></h5>
                    <p class="card-text">Address : <?php echo $author_detail[
                        'address'
                    ]; ?> </p>
                    <p class="card-text">Phone Number : <?php echo $author_detail[
                        'phone_number'
                    ]; ?> </p>
                    <p class="card-text">About Author : <?php echo $author_detail[
                        'author_description'
                    ]; ?> </p>  
                    </div>
                    </div>
                </div>                    
            </div>
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