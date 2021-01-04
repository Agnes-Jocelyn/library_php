<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../library/Style/style.css">
</head>

<body>
    <!-- navbar -->
    <?php include_once '../Layout/Navbar.php'; ?>
    <?php include_once '../../model/auth/RegisterController.php'; ?>
    <?php include '../../helper/response.php'; ?>

    <div class="container mt-4">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title">Login Here</h5>
                <form action="../../model/auth/LoginController.php" method="POST">
                   <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Input your email here" required>
                   </div>
                   <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Input your password here" required>
                   </div>
                   <div class="form-group">
                        <button class="btn btn-info btn-block" name="login_user">Login</button>
                   </div>
                   <div class="form-group">
                        <p>Don't have account yet ? 
                            <a href="../auth/register.php">Register here</a> 
                            or
                            <a href="../auth/forgot_password.php">Forgot password</a>
                        </p>
                   </div>
                </form>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>