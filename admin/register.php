<!DOCTYPE html>
<html>
<head>
  <title>Admin Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Custom Theme files -->
  <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->

  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <!-- //web font -->

</head>
<body>

  <!-- main -->
  <div class="w3layouts-main"> 
    <div class="bg-layer">
      <h1 style="color: white;text-shadow: 1px 1px 8px black;">Admin Registration</h1>
      <div class="header-main">
        <div class="main-icon">
          <span class="fa fa-eercast"></span>
        </div>
        <div class="header-left-bottom">
          <form action="../actions/register_user_action.php" method="post">   
            <div class="icon1">
              <span class="fa fa-user"></span>
              <input type="text" placeholder="First Name" name="firstName" required=""/>
            </div>
            <div class="icon1">
              <span class="fa fa-user"></span>
              <input type="text" placeholder="Last Name" name="lastName" required=""/>
            </div>
            <div class="icon1">
              <span class="fa fa-envelope"></span>
              <input type="email" placeholder="Email Address" name="email" required=""/>
            </div>
            <div class="icon1">
              <span class="fa fa-phone"></span>
              <input type="text" placeholder="Contact" name="contact" required=""/>
            </div>
            <div class="icon1">
              <span class="fa fa-lock"></span>
              <input type="password" placeholder="Password" name="password" required=""/>
            </div>
            <div class="bottom">
              <button class="btn" type="submit" name="register">Register</button>
            </div>
            <div class="links">
              <p class="right"><a href="../index.php">Already have an account? Login Here</a></p>
              <div class="clear"></div>
            </div>
          </form> 
        </div>
      </div>

    </div>
  </div>  
  
</body>
</html>
