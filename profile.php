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
        <h2>Top 5 Adventures</h2>
            <ul class="adventures">
            <?php get_adventure(); ?>
            </ul>
    </div>
    <h3>Welcome <?php echo $_SESSION['name']; ?></h3>
    <?php
        if (isset($_SESSION)){
        echo " <p><a href='adventureform.php'>click here to create an adventure</a> </p>";
        }
 ?>
</div>

<?php include ("templates/footer.php"); ?>