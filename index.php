<?php
ob_start();
include ("templates/header.php");
include ("functions/function.php");
?>
            <form  action="functions/login.php" method="post">
                Email <input type="email" name="username" placeholder="User name" required="required"/>
                Password <input type="password" name="password" placeholder="******" />
                <button name="login">Login</button>
            </form>
            <div id="register">
                <h5><a href="registerform.php"> Click here to register</a></h5>
            </div>
        </div>
    </div>
</div>
<div id="content_region">
    <div id="main_content">
        <h2>Top 5 Adventures</h2>
            <ul class="adventures"><?php get_adventure(); ?>
            </ul>
    </div>
</div>

<?php include ("templates/footer.php"); ?>