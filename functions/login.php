<?php
session_start();
include ("database.php");
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $checklogin = mysqli_query($conn, "SELECT * FROM USERS WHERE email = '$username' AND password = '$password'");

    if (mysqli_num_rows($checklogin) == 1) {
        $row = mysqli_fetch_assoc($checklogin);
        $username = $row['email'];
        $lastname = $row['lastname'];
        $name = $row['firstname'];
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['LoggedIn'] = 1;
        echo "<script>window.open('../profile.php', '_self')</script>";
        exit();
    }
    else {
        echo "<script>alert('Username and/or password incorrect')</script>";
    }
}