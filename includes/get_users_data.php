<?php
    include "../header.php";
    include "config.php";

    $user = "SELECT * FROM users";
    $run_user = mysqli_query($conn, $user);

    while($row_user = mysqli_fetch_array($run_user)) {
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_profile = $row_user['user_profile'];
        $login = $row_user['log_in'];

        echo "
            <li>
                <div class='chat-left-img'>
                    <img src='$user_profile'>
                </div>
                <div class='chat-left-details'>
                <p><a href='home.php?user_name=$user_name'>$user_name</a></p>
            ";
            if($login == "online") {
                echo "<span><li class='fa fa-circle' aria-hidden='true'>Online</li></span>";
            }else {
                echo "<span><li class='fa fa-circle-o' aria-hidden='true'>Offine</li></span>";
            }
        echo "
                </div>
            </li>
        ";

    }

?>