<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend Verify</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../library/Style/style.css">
</head>

<body>
    <?php require_once '../../model/auth/RegisterController.php' ?>
    <?php include '../../helper/response.php' ?>
    <?php include '../../view/Layout/Navbar.php' ?>
    <?php require_once '../../library/process.php';
    $token = $_GET['token'];
    $email = $_GET['email']; ?>

    <div class="container mt-4">
        <h4>Want To Resent The Vertification Email</h4>
        <p>Input your email and we will send you and email</p>
        <div class="card">
        <div class="card-body">
        <h5 class="card-title">Verify Your Account Here</h5>
        <form action="../../model/auth/RegisterController.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="verify_token" value="<?php echo $token; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <button class="btn btn-danger btn-block" name="verify_account">Verify</button>
        </form>
        </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>