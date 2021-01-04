<?php

include '../../library/process.php';

session_start();

// destroy session
session_abort();

header('location: ../../view/auth/login.php');
