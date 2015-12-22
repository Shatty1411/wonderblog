<?php
include ("functions/login.php");
include ("functions/database.php");
include ("functions/function.php");
include("templates/header.php");
?>
        <h3>Welcome <?php echo $_SESSION['name']; ?></h3>
    </div>
</div>
</div>
<div id="content_region">
    <div id="main_content">
        <h2>Welcome to the Admin area</h2>
        <ul class="admin_menu">
            <li><a href="adventureform.php">Create an Adventure</a>
            </li>
            <li><a href="test.php">Manage Users</a>
            </li>
        </ul>
<form method="post" action="functions/adventure.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <legend>Title</legend><input type="text" name="title">
            </td>
        </tr>
        <tr>
            <td>
                <legend>Country of adventure: </legend><input type="text" name="ad_country">
            </td>
        </tr>
        <tr>
            <td>
                <legend>Date</legend><input type="date" name="ad_date">
            </td>
        </tr>
        <tr>
            <td>
                <legend>Adventure</legend><textarea cols="70" rows="20" name="story" placeholder="tell about an adventure"></textarea>
            </td>
        </tr>
        <tr>
            <td>Select Photo (one or multiple):</td>
            <td><input type="file" name="files[]" id="files" multiple="multiple"/></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="edit">Edit</button>
            </td>
        </tr>
    </table>
</form>
        <?php include("templates/footer.php"); ?>
