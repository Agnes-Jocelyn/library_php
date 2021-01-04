<?php

include '../../library/process.php';

session_start();

//sign in user
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $link_address = "../../view/auth/resend_verify.php";
    $errors = [];

    $result = $mysqli->query(
        "SELECT * FROM users WHERE email = '$email' LIMIT 1 "
    ) or die($mysqli->error);
    
   
    if (mysqli_num_rows($result) === 1) {
        $user = $result->fetch_assoc();

        if($user['verify_token'] == null){
            $errors['login_fail'] = "Please Verify your account first!" .  " Have not receive email yet? <a href='".$link_address."'>Send Verification email.</a>";
        }else{
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['name'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['message'] = 'Welcome user';
                $_SESSION['msg_type'] = 'success';
    
                header('location: ../../view/author/index_author.php');
                exit();
            } else {
                $errors['login_fail'] = 'Sorry, wrong password... please try again';
            }
        } 
    }else {
        $errors['login_fail'] = 'sorry, wrong email... please try again';
    }

        
    if (count($errors) > 0) {
        $_SESSION['message'] = $errors['login_fail'];
        $_SESSION['msg_type'] = 'danger';

        echo "<script>window.location.assign('../../view/auth/login.php')</script>";
    }
}
