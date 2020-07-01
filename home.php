<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App||Home</title>
</head>
<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="inpur-group searchbox">
                    <div class="input-group-btn">
                        <center>
                            <a href="includes/find_friends.php">
                                <button class="btn btn-default search-icon" name="search_user" type="submit" action="includes/get_users_data.php">
                                    Add New User
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <!-- <?php include("includes/get_users_data.php"); ?> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting session data -->
                    <?php
                        $user = $_SESSION['user_email'];
                        $get_user = "SELECT * FROM users WHERE user_email='$user'";
                        $run_user = mysqli_query($conn, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];

                        // getting user data on click
                        if(isset($_GET['user_name'])){
                            global $conn;

                            $get_username = $_GET['user_name'];
                            $get_user = "SELECT * FROM users where user_name = '$get_username'";

                            $run_user = mysqli_query($conn, $get_user);
                            $row_user = mysqli_fetch_array($run_user);
                            $user_name = $row_user['user_name'];
                            $user_profile_image = $row_user['user_profile'];
                            
                        }
                        $total_messages = "SELECT * FROM users_chats WHERE 
                        (sender_username = '$user_name' AND receiver_username = '$username') OR 
                        (receiver_username='$user_name' AND sender_username='$username')";

                        $run_messages = mysqli_query($conn, $total_messages);
                        $total = mysqli_num_rows($run_messages);
                    ?>
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo"$user_profile_image";?>" alt="">
                        </div>
                        <div class="right-header-detail">
                            <form action="" method="post">
                                <p><?php echo "$username"; ?></p>
                                <span><?php echo "$total" ?>Messages</span>&nbsp; &nbsp;
                                <button name="logout" class="btn btn-danger">Logout</button>
                            </form>
                            <?php if(isset($_POST['logout'])){
                                // $update_msg = mysqli_query($conn, "UPDATE users SET login")
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>