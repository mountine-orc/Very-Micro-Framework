
<?php foreach($result as $row): ?>
    <h1><?=$row['name']?></h1><br>
    <?=$row['text']?>
<?php endforeach; ?>

<br><br>Add a comment:<br>
Your Name: <input name="name" id="name" placeholder="Input your Name"> 
Your e-mail: <input type="email" name="email" id="email" placeholder="Input your e-mail"><br><br>
<textarea name="comment" id="comment" placeholder="Add comment here..." cols="71" rows="10"></textarea>
<input type="hidden" value="<?=$row['id']?>" name="articleId" id="articleId"><br>
Captcha: <img src="/captcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg'> <input name="captcha" id="captcha"><br><br>
<button id="addCommentButton">Add comment</button>

<h2>Comments</h2>
<div id="commentList">
    <?php foreach($comments as $row): ?>
        <br><br>User <b><?=!empty($row['user_name'])?$row['user_name']:"***"?>(<?=$row['email']?>)</b> wrote:<br>
        <?=$row['text']?>
    <?php endforeach; ?>
</div>
<script>

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function refreshCaptcha(){
	$( "#captchaimg" ).attr("src","/captcha/captcha.php"+"?rand="+Math.random()*1000);
}

$(document).ready(function(){                          
    $('#addCommentButton').click(function(){
        if ($( "#comment" ).val().trim() == "" || $( "#email" ).val().trim() == "" || $( "#name" ).val().trim()=="" || $( "#captcha" ).val().trim()=="") {
            alert("All field must be full");
            return false;
        }
        if (!isEmail($( "#email" ).val())) {
            alert("email is not valid");
            return false;
        }
        $.ajax({
            url: "/comment/add",
            type: "POST",
            data: {
                message: $( "#comment" ).val(),
                articleId: $( "#articleId" ).val(),
                name: $( "#name" ).val(),
                email: $( "#email" ).val(),
                captcha: $( "#captcha" ).val(),
            },
            success: function( data ) {
                if (data == "CAPTCHAFALSE") {
                    refreshCaptcha();
                    alert("Captcha is wrong");
                }
                if (data == "TRUE") {
                    $( "#commentList" ).html( "<br>User <b>" + $( "#name" ).val() + "(" + $( "#email" ).val() + ")</b> wrote:<br>" + $( "#comment" ).val() + "<br>" + $( "#commentList" ).html() );
                    $( "#comment" ).val("");
                    $( "#email" ).val("");
                    $( "#name" ).val("");
                    $( "#captcha" ).val("");
                }
                else
                    alert("Can't add new comment");
            }
        });
    })
});
</script>