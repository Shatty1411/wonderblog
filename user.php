<?php
include ("functions/login.php");
include ("functions/database.php");
include ("templates/header.php");
include ("functions/function.php");
?>

        </div>
    </div>
</div>
<div id="content_region">
    <div id="main_content">
    <h3>Information about each user</h3>
    <div id = author_info>
<?php user_info(); ?>
</div>
    </div>
    <?php
        if (isset($_SESSION)){
        echo " <p><a href='adventureform.php'>click here to create an adventure</a> </p>";
        }
 ?>
</div>

<?php include ("templates/footer.php"); ?>