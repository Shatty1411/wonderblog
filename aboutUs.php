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
</div>
<div id="content_region">
    <div id="main_content">
    <p><h2>This is an About Us page</h2></p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam id tortor elementum, ornare sem ut, viverra mi.
            Nullam nulla metus, efficitur nec lorem non, egestas elementum urna.
            Donec porta augue ac diam euismod, non suscipit elit malesuada.
            Quisque gravida, libero eget cursus cursus, ante neque venenatis leo, sed euismod arcu ex sed erat.
            Nulla facilisi. Nam pharetra pharetra diam gravida aliquet. Sed non semper tellus.
            Cras blandit, metus id finibus mollis, lectus leo tincidunt nibh, mollis ultrices nulla ipsum nec justo.
            Duis elementum, justo sit amet pharetra pulvinar, est eros vehicula sapien, aliquet dapibus augue enim quis orci.
            Duis aliquam ultricies purus, in malesuada ex tincidunt a.
            Aenean ex enim, luctus at consectetur volutpat, convallis et velit.
            Vestibulum efficitur elementum elit quis fermentum. Nunc id auctor risus, vel facilisis odio.

            Sed ut libero ac felis ultrices aliquam. Phasellus auctor et eros a facilisis.
            Ut porta quam eu feugiat dapibus. Sed faucibus ante sed ornare semper.
            Curabitur nec laoreet ligula. Duis at mollis nibh. Aenean tincidunt vel dolor sed placerat.
            Nam ex massa, porttitor sed dolor in, ultrices ornare neque. Mauris accumsan consectetur ornare.
            Curabitur lobortis bibendum ipsum, vitae luctus nisi dapibus et.
            Suspendisse efficitur, turpis at tristique porttitor, nisi erat malesuada mauris, in rutrum ipsum ex in lectus.
            Nam convallis odio elementum massa tincidunt, vel accumsan dolor dictum. Fusce vel elit mauris.
        </p>
</div>
    </div>

<?php include ("templates/footer.php"); ?>