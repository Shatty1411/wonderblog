<?php
include ("login.php");
include ("database.php");


if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $ad_country = $_POST['ad_country'];
    $ad_date = $_POST['ad_date'];
    $story = $_POST['story'];
    $user_email = $_SESSION['username'];

    $id = mysqli_query($conn, "SELECT * from USERS WHERE email='$user_email'");
    $u_id = mysqli_fetch_assoc($id);
    $user_id = $u_id['userID'];
    $f_name = $u_id['firstname'];
    $l_name = $u_id['lastname'];
    $authorname = $f_name." ".$l_name;
    if (isset($_FILES['files'])) {
        $sql = "SELECT adventureID FROM Adventures WHERE adventureTitle ='$title'";
        $run_sql = mysqli_query($conn, $sql);
        $make_sql = mysqli_fetch_assoc($run_sql);
        $adventureID = $make_sql['adventureID'];
        echo $adventureID."<br 7>";
        $errors = array();
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $key . $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
            $desired_dir = "../images/".$title."/";
            echo $desired_dir . "<br />";
            if (is_dir($desired_dir) == false) {
                mkdir("$desired_dir", 0755);
            }// Create directory if it does not exist
            if (is_dir("$desired_dir/" . $file_name)==false ) {
                move_uploaded_file($file_tmp, $desired_dir . $file_name);
            }
            if ($run_query) {
                echo "image upload successfuul";
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Photos (photoName,adventureID) VALUES ('$desired_dir','$adventureID')";
        $run_query = mysqli_query($conn, $query);
    }

    $data = "INSERT INTO Adventures(adventureTitle, adventureCountry, date, story, adventureAuthor, userID, adventurePhotoName)
             VALUES ('$title', '$ad_country', '$ad_date', '$story', '$authorname', '$user_id', '$desired_dir' )";
    $run_data = mysqli_query($conn, $data);
        if ( $run_data) {
            echo "<script>alert('Your adventure was successfully created')</script>";
            echo "<script>window.open('../profile.php', '_self')</script>";

        }

}

