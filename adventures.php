<?php
include ("templates/header.php");
include ("functions/function.php");
?>

            <form method="post" action="" id="login">
                Email <input type="email" name="username" placeholder="User name" required="required"/>
                Password <input type="password" name="password" placeholder="******" />
                <button name="login">Login</button>
            </form>
            <div id="register">
                <h5><a href="registerform.php"> Click here to register</a></h5>
            </div>
        </div>
    </div>
    <div id="search">
    <form method="post">
  Search wondablog:
  <input >
  <input type="search" name="wondasearch">
  <input type="submit" name="search">
</form>
<?php search(); ?>
</div>
</div>
<div id="content_region">
    <div id="main_content">
    <p><h2>All created Adventures</h2></p>
        <p><?php get_adventures(); ?>
        </p>
</div>
    </div>

<?php include ("templates/footer.php"); ?>