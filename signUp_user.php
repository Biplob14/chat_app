<?php
    include "includes/config.php";
    if(isset($_POST['sign_up'])){
        $name = htmlentities(mysqli_real_escape_string($conn, $_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($conn, $_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($conn, $_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($conn, $_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['user_gender']));
        $rand = rand(1, 2);
        if($name == ''){
            echo "<script>alert('Please provide your name');</script>";
        }
        if(strlen($pass) < 8){
            echo "<script>alert('Password length should be minimum 8 characters');</script>";
            // echo "<script>window.open('signup.php', '_self');</script>";
            exit();
        } else{
            $pass = md5($pass);
        }
        $check_email = "SELECT * FROM users WHERE user_email = '$email'";
        $run_email = mysqli_query($conn, $check_email);

        $check = mysqli_num_rows($run_email);

        if($check > 0){
            echo "<script>alert('email already taken, try with another email.');</script>";
            echo "<script>window.open('signup.php', '_self');</script>";
            exit();
        }
        $profile_pic = "images/profile" . $rand . ".png";

        $insert = "INSERT INTO users(user_name, user_pass, user_email, user_profile, user_country, user_gender) VALUE ('$name', '$pass', '$email', '$profile_pic', '$country', '$gender');";

        $query = mysqli_query($conn, $insert);

        if($query){
            echo "<script>alert('Congratulations $name, your account has been created successfully');</script>";
            echo "<script>window.open('signIn.php', '_self');</script>";
        }
        else{
            echo "<script>alert('Register failed, try again!')</script>";
        }
    }
?>