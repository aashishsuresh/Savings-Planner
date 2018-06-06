<!DOCTYPE html>
<html lang="en">
<head>
	<title>Savings Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function validate()
		{
			var usrname=document.getElementById('usrname').value;
			var pwd=document.getElementById('pwd').value;
			if(!pwd)
			{
				window.alert('The password field is empty');
				return false;
			}
			if(!usrname)
			{
				window.alert('Username field is empty');
				return false;
			}
			return true;
		}
	</script>
</head>

<body class="body">
<header class="mainHeader">Savings Planner</header>

<nav  class="navi"><ul class="navi">
	<li><a href="newuser.php">Sign Up</a></li>
	<li><a href="#">News Feed</a></li>
	<li><a href="#">Contact Us</a></li>
</ul></nav>




<div class="mainContent">
	<div class="about">
		<article>
			<header><h2 class="header_for_topic">About Us</h2></header>
			<content>
				<p class="post_content">The problem with most budgets is they don't work!
							We help you plan your life in a way that you could enjoy
							more by spending the cash in the right way. We help you
							compare your expenditure across months and years which helps
							to identify your spending pattern and make you do necessary
							alterations to it. This unique budgeting guide counters that,
							and includes sophisticated free budget planner tools, which
							analyse your finances and then help you manage and control your cash.
							Compare your spending patterns graphically and move towards a
							PROSPEROUS TOMORROW.
				</p>
			</content>
		</article>
	</div>
	<aside class="login">
		<header><h2 class="header_for_topic">Login</h2></header>
		<content>
		<form onsubmit="return validate()" method="POST" action="login_verification.php">
			<center><input type="text" id="usrname" name="usrname" placeholder="User Name/E-mail ID" size="30%"></center><br>
			<center><input type="password" name="pwd" id="pwd" placeholder="Password" size="30%"></center><br>
			<center><input type="submit" value="Submit" name="submit"></center>
		</form>
		</content>
	</aside>
</div>
</body>
</html>
