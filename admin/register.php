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

    function validateForm() {
      var firstName = document.forms["registrationForm"]["firstName"].value;
      var lastName = document.forms["registrationForm"]["lastName"].value;
      var email = document.forms["registrationForm"]["email"].value;
      var contact = document.forms["registrationForm"]["contact"].value;
      var password = document.forms["registrationForm"]["password"].value;

      // Check if any field is empty
      if (firstName == "" || lastName == "" || email == "" || contact == "" || password == "") {
        alert("All fields must be filled out");
        return false;
      }

      // Check if email is valid
      if (!validateEmail(email)) {
        alert("Please enter a valid email address");
        return false;
      }

      // Check if password is valid
      if (!validatePassword(password)) {
        alert("Password must be at least 6 characters long and contain a number");
        return false;
      }

      // Check if contact contains only digits
      if (!/^\d+$/.test(contact)) {
        alert("Contact must contain only numbers");
        return false;
      }

      return true;
    }

    function validateEmail(email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    }

    function validatePassword(password) {
      var re = /^(?=.*\d).{6,}$/;
      return re.test(password);
    }
  </script>

  <!-- Custom Theme files -->
  <link href="../css/register_style.css" rel="stylesheet" type="text/css" media="all" />
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
          <form name="registrationForm" action="../actions/register_user_action.php" onsubmit="return validateForm()" method="post">   
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
