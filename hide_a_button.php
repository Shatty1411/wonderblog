<div>
    <a class="comment_link" href="#">Comment</a>
    <div class="comment_form">
        <form  action="docomment.php" method="post">
            <input type="text" name="comment">
        </form>
    </div>
</div>

<div>
    <a class="comment_link" href="#">Comment</a>
    <div class="comment_form">
        <form  action="docomment.php" method="post">
            <input type="text" name="comment">
        </form>
    </div>
</div>


<div>
    <a class="comment_link" href="#">Comment</a>
    <div class="comment_form">
        <form  action="docomment.php" method="post">
            <input type="text" name="comment">
        </form>
    </div>
</div>


$(".comment_form").hide();
$(".comment_link").click (function(e){
$(this).next(".comment_form").show(); // problem here...
e.preventDefault();
});

//logout script
session_start();
session_destroy();
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);