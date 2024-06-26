<!DOCTYPE html>
<html>

<head>
	<title>Index</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
		content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

		function validateLoginForm() {
			var email = document.forms["loginForm"]["email"].value;
			var password = document.forms["loginForm"]["password"].value;

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
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>

<body>

	<!-- main -->
	<div class="w3layouts-main">
		<div class="bg-layer">
			<h1 style="color: white;text-shadow: 1px 1px 8px black;">Login here..</h1>
			<div class="header-main">
				<div class="main-icon">
					<span class="fa fa-eercast"></span>
				</div>
				<div class="header-left-bottom">
					<form name="loginForm" action="actions/login_user_action.php" onsubmit="return validateLoginForm()" method="post">
						<div class="icon1">
							<span class="fa fa-user"></span>
							<input type="email" placeholder="Email Address" name="email" required="" />
						</div>
						<div class="icon1">
							<span class="fa fa-lock"></span>
							<input type="password" placeholder="Password" name="password" required="" />
						</div>

						<div class="bottom">
							<button class="btn" type="submit" name="submit">Log In</button>
						</div>
						<div class="links">
							<div class="clear"></div>
						</div>
						<div class="links">
							<p class="right">Don't have an account?<a href="../PROJECT_NEW/admin/register.php">Register here</a></p>
							<div class="clear"></div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</body>

</html>
