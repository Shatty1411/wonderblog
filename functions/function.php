<?php
include ("login.php");
include ("database.php");

function register() {
    global $conn;

    if (isset($_POST['register'])) {
        $f_name = mysqli_real_escape_string($conn, $_POST['fname']);
        $l_name = mysqli_real_escape_string($conn, $_POST['lname']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $passw = MD5($_POST['passw']);
        $dofb = $_POST['bday'];
        $role = $_POST['role'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $get_email = mysqli_query($conn,"select email from USERS where email = '$email'");
        $check_mail = mysqli_num_rows($get_email);

        if ($check_mail==1) {
            $html = "<script>alert('This email already exists')</script>";
            echo $html;
            exit();
        }
        if (isset($passw)){
            if (strlen($passw)<=6) {
                echo "<script>alert('Password too short')</script>";

                exit();
            }
        }
        else {
            echo "<script>alert('Password needed')</script>";

            exit();
        }
        /*if ($role=='Author'){
            $admin_data = "INSERT INTO Admins (username, password) VALUES ('$email', $passw)";
            $insert_admin_data = mysqli_query($conn, $admin_data);
        }*/

        $data = "INSERT INTO USERS (firstname, lastname, email, country, dofBirth, password, role) VALUES ('$f_name', '$l_name', '$email', '$country', '$role', ('$passw'), '$dofb')";
        $insert_data = mysqli_query($conn, $data);

        if ($insert_data) {
            header( "refresh:2;url=../index.php" );
            echo "<script>alert('Your registration was successful')</script>";
            flush();
            exit();
        }
    }
}



function get_adventure() {
    global $conn;
    $adventure = "SELECT * FROM Adventures ORDER BY date LIMIT 5 ";
    $get_adventure = mysqli_query($conn, $adventure);
    while($row = mysqli_fetch_array($get_adventure)){
        $adv_title= $row['adventureTitle'];
        $adv_id = $row['adventureID'];
        echo "<li><a href='home.php?adventure=$adv_id'>$adv_title</a></li>";
    }
}

function get_full_adventure(){
    global $conn;
    if(isset($_GET['adventure'])){
        $id = $_GET['adventure'];
        $f= "SELECT * FROM Adventures WHERE adventureID = '$id'";
        $run_f = mysqli_query($conn, $f);

        while ($row = mysqli_fetch_array($run_f)){
            $event_title = $row['adventureTitle'];
            $event_author = $row['adventureAuthor'];
            $event_country = $row['adventureCountry'];
            $event_date = $row['date'];
            $event = $row['story'];
            $photo = $row['adventurePhotoName'];
            echo "<div id='full_adventure'>
<p><h2>$event_author created $event_title on $event_date</h2></p>
<p><h4>Event happened at $event_country</h4></p>

<p>$event</p>
</div>";
        }
        $dirname = $photo;
        $files = glob("$dirname*.*");
        for ($i=0; $i<count($files); $i++) {
            $image = $files[$i];
            $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
            );
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_file)) {
                echo '<div id="adv_image">
<img src="'.$image .'" alt="Random image" /></div>';
            }
            else {
                continue;
            }
        }

    }

}


function comment(){
    global $conn;
    $html ="";
    $adv_id = $_GET['adventure'];
    $s_comment = "SELECT * FROM Comments WHERE adventureID='$adv_id'";
    $r_comment = mysqli_query($conn, $s_comment);
    while ($row = mysqli_fetch_array($r_comment)){
        $name = $row ['userID'];
        $story = $row['comment'];
        $date = $row['date'];
        $d_name = "SELECT firstname FROM USERS WHERE userID = '$name'";
        $r_name = mysqli_query($conn, $d_name);
        $p_name = mysqli_fetch_assoc($r_name);
        $real_name =$p_name['firstname'];
        $html .=<<<EOT
<div class ="comment">
<div id = "name">$real_name wrote</div>
<div id = "raw_comment">$story</div>
</div>
EOT;
    }
    return $html;
}

function get_adventures() {
    global $conn;
    $adventure = "SELECT * FROM Adventures ORDER BY date";
    $get_adventure = mysqli_query($conn, $adventure);
    while($row = mysqli_fetch_array($get_adventure)){
        $adv_title= $row['adventureTitle'];
        $adv_id = $row['adventureID'];
        echo "<li><a href='home.php?adventure=$adv_id'>$adv_title</a></li>";
    }
}

function search(){
    global $conn;
    $html = ' ';
    if (isset($_GET['search'])){
        $result = filter_var($_GET['wondasearch'], FILTER_SANITIZE_STRING);
        $d_result = "SELECT * FROM USERS WHERE LOWER (concat(NULLIF (firstname, '', lastname, '', vote, ''))) LIKE LOWER ('%$result%')";
        $r_result = mysqli_query($conn, $d_result);
        $search_count = mysqli_num_rows($r_result);
        if (!$search_count==0){
            while ($row = mysqli_fetch_array($r_result)){
                $name = $row['firstname'];
                $lname = $row['lastname'];
                $full_name = $name . ' ' . $lname;
                $html .=<<<EOT
EOT;
            }
        }
        else{
            echo "NO search result for the keywords entered";
        }


    }
}

function get_authors (){
    global $conn;

    $author = "SELECT * FROM USERS WHERE role = 'author' ORDER BY firstname";
    $d_author = mysqli_query($conn, $author);
    while($row = mysqli_fetch_array($d_author)){
        $author_name= $row['firstname'];
        $author_l_name = $row['lastname'];
        $full_name = $author_name . ' ' . $author_l_name;
        $author_id = $row['userID'];
        $author_story = "SELECT * FROM Adventures WHERE userID='$author_id'";
        $run_author_story = mysqli_query($conn, $author_story);
        $data_author = mysqli_fetch_assoc($run_author_story);
        $story_title = $data_author['adventureTitle'];
        echo "<li><a href='user.php?author=$author_id'>$full_name wrote $story_title</a></li>";
    }
}

function user_info (){

        global $conn;
        $html = '';
        $author_id = $_GET['author'];
        $author = "SELECT * FROM USERS WHERE userID = '$author_id'";
        $d_author = mysqli_query($conn, $author);
        while($row = mysqli_fetch_array($d_author)){
            $author_name= $row['firstname'];
            $author_l_name = $row['lastname'];
            $full_name = $author_name . ' ' . $author_l_name;
            $author_email= $row['email'];
            $author_country=$row['country'];
            $author_doB = $row['dofBirth'];
            $author_story = "SELECT * FROM Adventures WHERE userID='$author_id'";
            $run_author_story = mysqli_query($conn, $author_story);
            $amount = mysqli_num_rows($run_author_story);
            while ($data_author = mysqli_fetch_assoc($run_author_story)){
                $story_title = $data_author['adventureTitle'];
            }
            $html .=<<<EOT
<div class = "facts">
Name: $full_name
Email: $author_email
Country: $author_country
Date of Birth: $author_doB
He has written $amount adventures
</div>
EOT;
        }
    return $html;
    }
