<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signUp.css">  <!--custom css-->

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- ajax link -->
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script> 
</head>
<body>
    <div class="signUp-form">
        <form action="signUp_user.php" method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chatting with your friends.</p>
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="user_name" class="form-control" placeholder="User Name" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="user_pass" class="form-control" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" name="user_email" class="form-control" placeholder="Provide your email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select class="form-control" name="user_country" id="" required>
                    <option disabled>Select Country</option>
                    <option value="">Bangladesh</option>
                    <option value="">India</option>
                    <option value="">Pakistan</option>
                    <option value="">Nepal</option>
                    <option value="">China</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" name="user_gender" id="" required>
                    <option disabled>Select Your Gender</option>
                    <option value="">Male</option>
                    <option value="">Female</option>
                    <option value="">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="checkbox-inline"><input type="checkbox" name="" required> I accept the <a href="#">Terms of use </a>&amp;<a href="#"> privacy policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
            </div>
            <!-- <?php include "signUp_user.php" ?> -->
        </form>
        <div class="text-center small" style="color: #26C2FF;">Already have an accoutn? <a href="signIn.php">Sign In</a></div>
    </div>
</body>
</html>