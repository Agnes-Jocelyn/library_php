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

    <div class="container mt-4">
        <h4>Want To Resent The Vertification Email</h4>
        <p>Input your email and we will send you and email</p>
        <form action="../../model/auth/RegisterController.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Insert your email here" required>
            </div>
            <div class="form-group">
            <button class="btn btn-info btn-block" name="resend_verification">Send Verification Email</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>