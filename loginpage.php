<!DOCTYPE html>

<html lang="en">
<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Login Page</title>
  <link rel="icon" type="image/x-icon" href="icon.png">
  
<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"17c2d8939be8684f6c42dc0002ef3dd83","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
</head>
<body>
  <div class="login-wrapper">
    <form action="login.php" class="form" method="POST">
          <!--<a href="#" class="close">&times;</a>-->
          <h2>Login</h2>
          <div class="input-group">
            <input type="email" name="email" id="email1"  autocomplete="off" required>
            <label for="email">Email</label>
          </div>
          <div class="input-group">
            <input type="password" name="password" id="password1"  minlength="8" required>
            <label for="password">Password</label>
          </div>
          <!-- <div class="g-recaptcha" data-sitekey="6LeCJmEkAAAAAOrMeAxX_iCkGHp22uadGbgR6EUn"></div> -->
          <input type="submit" value="Login" id="login1" name="login" class="submit-btn">
          <a href="forgot-password.php" class="forgot-pw">Forgot Password?</a><br><br>
          are you new here?
      <a href="reg.php" class="sign-up">Register</a><br><br>
      </form>
    
    <!-----------------------------------------------------------------------0------------------------->
    <!--forgot password-->
    <div id="forgot-pw">
      <form action="" class="form">
        <a href="forgot-password.php" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email2" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Send reset link" class="submit-btn">
      </form>
    </div>
    <!----------------------------------------------------------------------------------------------------------------------------->
    

  </div>
  
if (isset($_GET['verification'])) 
{
  if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM registration_s WHERE code='{$_GET['verification']}'")) > 0) 
  {
    $query = mysqli_query($con, "UPDATE registration_s SET code='' WHERE code='{$_GET['verification']}'");
    if ($query) 
    {
        $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        header("Location: loginpage.php");
    }
      
  } 
  else 
  {
      header("Location: reg.php");
  }
}
</body>
</html>   