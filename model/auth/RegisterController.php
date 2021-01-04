<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../../library/process.php';
require_once '../../vendor/autoload.php';

session_start();

// Sign Up User
if (isset($_POST['register_user'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $created_at = date('Y-m-d H:i:s', time());
    $token = bin2hex(random_bytes(50)); //generate unique token
    $errors = [];
    $mail = new PHPMailer(true);
    $message = file_get_contents('../../view/emails/verify_account.php');
    $message = str_replace('%fullname%', $fullname, $message);
    $message = str_replace(
        '%link%',
        "http://localhost/Glints/library/View/auth/verify.php?token=" . $token . "&email=" . $email, $message
    );

    if ($_POST['password'] !== $_POST['password_conf']) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['message'] =
            "Sorry, your password doesn't match with password confirmation. Please try again";
        $_SESSION['msg-type'] = 'danger';

        header('location: ../../view/auth/register.php');
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Encrypting pass
        $password_conf = password_hash(
            $_POST['password_conf'],
            PASSWORD_DEFAULT
        );

        ($result = $mysqli->query(
            "SELECT * FROM users WHERE email= '$email' LIMIT 1 "
        )) or die($mysqli->error);

        if (mysqli_num_rows($result) === 1) {
            $errors['register_fail'] =
                'Sorry, your email already registered, please use another email';
        }

        if (count($errors) === 0) {
            //send verify email
            $mail->isSMTP();
            $mail->SMTPDebug = 3;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'agnesjocelyn95@gmail.com';
            $mail->Password = ''; //isi password
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = 'tsl';
            //Set TCP port to connect to
            $mail->Port = 587;
            $mail->setFrom('agnesjocelyn@gmail.com', 'AgnesJ');
            $mail->addAddress($email, $fullname); //add recipient
            $mail->isHTML(true); //set email format to html

            $mail->Subject = 'Someone has something to say about ....';
            $mail->Body = $message;
            $mail->AltBody =
                'This is the body in plain text for non HTML mail clients';

            if (!$mail->send()) {
                $_SESSION['message'] =
                    'failed to send the email' . $mail->ErrorInfo;
                $_SESSION['msg_type'] = 'danger';

                header('location: ../../view/auth/register.php');
            }

            ($stmt = $mysqli->prepare(
                'INSERT INTO users SET fullname = ?, email = ?, password = ?, password_conf = ?, created_at = ? '
            )) or die($mysqli->errors);
            $stmt->bind_param(
                'sssss',
                $fullname,
                $email,
                $password,
                $password_conf,
                $created_at
            );
            $data = $stmt->execute();

            if ($data) {
                $stmt->close();

                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                $_SESSION['message'] = 'Account is succesfully registered';
                $_SESSION['msg_type'] = 'success';

                echo "<script>window.location.assign('../../view/auth/login.php')</script>";
                exit();
            } else {
                $_SESSION['error_msg'] =
                    'Database error : Could not register user';
            }
        } else {
            $_SESSION['message'] = $errors['register_fail'];
            $_SESSION['msg_type'] = 'danger';

            header('location : ../../view/auth/register.php');
        }
    }
}


// Verify Account
if (isset($_POST['verify_account'])) {
    $token = $_POST['verify_token'];
    $email = $_POST['email'];
    echo $email;
    echo $token;
    $verify_time = date('Y-m-d H:i:s', time());

    // find user by Email
    $user = mysqli_query($mysqli, "UPDATE users SET verify_token = '$token', verify_at ='$verify_time' WHERE email= '$email' LIMIT 1 ") or die(mysqli_error($mysqli));

    if (!$user) {           
        $_SESSION['message'] = "Sorry, Failed to verify your account";
        $_SESSION['msg_type'] = "danger";

        header('location:../../view/auth/login.php');
    }

    $_SESSION['message'] = "Successfully Verify your Account";
    $_SESSION['msg_type'] = "success";

    header('location:../../view/auth/login.php');
}

//resend verification 
if(isset($_POST['resend_verification'])){
    $email =  $_POST['email'];
    $token =  bin2hex(random_bytes(50));
    $mail = new PHPMailer(true);
    $verify_time = date('Y-m-d H:i:s', time());
    $errors = [];

    $result = $mysqli->query("SELECT * FROM users WHERE email = '$email' LIMIT 1 " ) or die($mysqli->error);

 
    if(mysqli_num_rows($result) === 1){
        $user =  $result->fetch_assoc();

        $current_year = date("Y");
        $fullname =  $user['fullname'];
        $message = file_get_contents('../../view/emails/verify_account.php');
        $message = str_replace('%fullname%', $fullname, $message);
        $message = str_replace ('%link%',"http://localhost/Glints/library/View/auth/verify.php?token=" . $token . "&email=" . $email, $message);
        $message = str_replace('%date%', $current_year, $message);
        

        //send verify email
        $mail->isSMTP();
        $mail->SMTPDebug = 3;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'agnesjocelyn95@gmail.com'; //your email
        $mail->Password = ''; //isi password
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = 'tsl';
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->setFrom('agnesjocelyn@gmail.com', 'AgnesJ');
        $mail->addAddress($email, $fullname); //add recipient
        $mail->isHTML(true); //set email format to html

        $mail->Subject = 'Verify your account';
        $mail->Body = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()){
            $_SESSION['message'] = "failed to send email";
            $_SESSION['msg_type'] = "danger";
        }else{
           $_SESSION['fullname'] = $fullname;
           $_SESSION['email'] = $email;
           $_SESSION['verified'] = false;
           $_SESSION['message'] = 'Success resend the verification email, please check your email';
           $_SESSION['msg_type'] = 'success';
           
           echo "<script>window.location.assign('../../view/auth/resend_verify.php')</script>";
           exit();
        }

    }else{
        $errors['verify_fail'] = "Sorry, your email doesn't exist in our database";
    }

    if(count($errors) > 0 ){
        $_SESSION['message'] = $errors['verify_fail'];
        $_SESSION['msg_type'] = "danger";

        // header('location: ../../view/auth/resend_verify.php');
    }

}