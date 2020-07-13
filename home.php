<?php 
session_start();
include "header.php";
if(!isset($_SESSION['user_email'])){
    header("location:signIn.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App||Home</title>
    <link rel="stylesheet" href="css/home.css">
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
                        <?php include("includes/get_users_data.php");?>
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
                            $username = $row_user['user_name'];
                            $user_profile_image = $row_user['user_profile'];
                            
                        }
                        $total_messages = "SELECT * FROM users_chat WHERE 
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
                                $update_msg = mysqli_query($conn, "UPDATE users SET login='offline' WHERE user_name = '$user_name'");
                                header("Location:logout.php");
                                exit();
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                            $update_msg = mysqli_query($conn, "UPDATE users_chats SET msg_status='read' 
                            WHERE sender_username = '$user_name' AND receiver_username = '$user_name'");
                            
                            $sel_msg = "SELECT * FROM user_chats WHERE (sender_username = '$user_name' 
                            AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username = '$username') ORDER BY 1 ASC";
                            $run_msg = mysqli_query($conn, $sel_msg);
                            while($row = mysqli_fetch_array($run_msg)) {
                                $sender_username = $row['sender_username'];
                                $receiver_username = $row['receiver_username'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];
                            
                        ?>
                        <ul>
                            <?php
                                // for sender view
                                if($user_name == $sender_username AND $username = $receiver_username){
                                    echo "
                                        <li>
                                            <div class='rightside-chat'>
                                                <span>$username <small>$msg_date</small></span>
                                                <p>$msg_content</p>
                                            </div>
                                        </li>
                                    ";
                                }
                                // for receiver view
                                else if($user_name == $receiver_username AND $username = $sender_username){
                                    echo "
                                        <li>
                                            <div class='rightside-chat'>
                                                <span>$username <small>$msg_date</small></span>
                                                <p>$msg_content</p>
                                            </div>
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                        <?php } ?> <!--close of while loop -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                            <input autocomplete="off" type="text" name="msg_content" placeholder="type your message">
                            <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $msg = htmlentities($_POST['msg_content']);

            if($msg == ""){
                echo "
                    <div class='alert alert-danger'>
                        <strong><center>Message was unable to send</center></strong>
                    </div>
                ";
            }
            else if(strlen($msg) > 100){
                echo "
                    <div class='alert alert-danger'>
                        <strong><center>Message is too long.Use max 100 characters</center></strong>
                    </div>
                ";
            }
            else{
                $insert = "INSERT INTO users_chats(sender_username, receiver_username, msg_content, msg_status, msg_date) 
                VALUES('$user_name', '$username', '$msg', 'unread', NOW())";
                $run_insert = mysqli_query($conn, $insert);
                
            }
        }
    ?>
</body>
</html>