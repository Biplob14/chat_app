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
        </div>
    </div>
</body>
</html>