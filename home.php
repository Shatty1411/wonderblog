<?php
include ("functions/login.php");
include ("functions/database.php");
include ("templates/header.php");
include_once ("functions/function.php");
?>

        </div>
    </div>
</div>
<div id="content_region">
    <div id="main_content">
        <!--<h2>Top 5 Adventures</h2>
            <ul class="adventures">
            <?php get_adventure(); ?>
            </ul>-->
    </div>
    <h3>Welcome <?php echo $_SESSION['name']; ?></h3>
    <?php
        if (isset($_SESSION)){
        echo " <p><a href='adventureform.php'>click here to create an adventure</a> </p>";
        }
 ?>
</div>


<?php
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
             ?>

             <p><h4>leave a comment</h4></p>
             <form id="comment_form" method="post" action="commentform.php">
             <table>
             <tr>
             <td>
             <legend>Comment</legend><textarea name="comment" cols="40" rows="5" placeholder="leave a comment"></textarea>
             </td>
             </tr>
             <tr>
             <td>
              <button type="submit" name="submit">comment</button>
</td>
</tr>
 <tr>
             <td>
              <input type="hidden" name="ad_id" value="<?php echo $_GET['adventure']; ?>" />
</td>
</tr>
 <tr>
             <td>
              <input type="hidden" name="us_name" value="<?php echo $_SESSION['username']; ?>" />
</td>
</tr>
</table>
</form>

<p><h3>All Comments</h3></p>
<?php echo comment(); ?>
<?php
    if (isset($_SESSION))
?>

<?php
include ("templates/footer.php"); ?>