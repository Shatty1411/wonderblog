<?php
include ("functions/login.php");
include ("functions/database.php");
include ("functions/function.php");
if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];
    $ad_id = $_POST['ad_id'];
    $us_na = $_POST['us_name'];
    if ($us_na == '') {
        echo 'Only logged in users can post comments.<a href="index.php">log in here</a>';
    } else {
        echo $comment;
        $sql = "SELECT userID FROM USERS WHERE email='$us_na'";
        $run_sql = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_array($run_sql)){
            $userid = $data['userID'];
            $i_comment = "INSERT INTO Comments (comment, adventureID, userID, date) VALUES ('$comment', '$ad_id', '$userid', 'NOW')";
            $run_comment = mysqli_query($conn, $i_comment);

        }  if ($run_comment){
            echo "comment successfully added";
        }
        else {
            echo "something wrong";
        }
    }
}


