<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<script>
	function validate()
	{
		var fname=document.getElementById("fname").value;
		if(fname)
		{
			if(!fname.match(/^[A-Za-z]+$/) > 0)
			{
				document.getElementById("fname_err").innerHTML="*The Name field can have only letters";
				document.getElementById("fname").focus();
				return false;
			}
			document.getElementById("fname_err").innerHTML="";
		}
		else
		{
			document.getElementById("fname_err").innerHTML="*The Name field can't be empty";
			document.getElementById("fname").focus();
			return false;
		}


		var lname=document.getElementById("lname").value;

		if(lname)
		{
			if(!lname.match(/^[A-Za-z]+$/) > 0)
			{
				document.getElementById("lname_err").innerHTML="*The Name field can have only letters";
				document.getElementById("lname").focus();
				return false;
			}
			else
				document.getElementById("lname_err").innerHTML="";
		}

		else
		{
			document.getElementById("lname_err").innerHTML="*The Name field can't be empty";
			document.getElementById("lname").focus();
			return false;
		}


		var dob=document.getElementById("dob").value;
		if(dob)
			document.getElementById("dob_err").innerHTML="";
		else
		{
			document.getElementById("dob_err").innerHTML="*Please mention Your Date Of Birth";
			document.getElementById("dob").focus();
			return false;
		}



		var insti=document.getElementById("insti").value;
		if(insti)
			document.getElementById("insti_err").innerHTML="";
		else
		{
			document.getElementById("insti_err").innerHTML="*Please mention the Institution name";
			document.getElementById("insti").focus();
			return false;
		}


		var mail=document.getElementById("mail").value;
		if(mail)
		{
			var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		        if(!expr.test(mail))
			{
				document.getElementById("mail_err").innerHTML="*Improper Mail address";
				document.getElementById("mail").value="";
				document.getElementById("mail").focus();
				return false;
			}
		}
		if(mail.length==0)
		{
			document.getElementById("mail_err").innerHTML="*The Email field can't be empty";
			document.getElementById("mail").focus();
			return false;
		}
		else
			document.getElementById("mail_err").innerHTML="";




		var pwd=document.getElementById("pwd").value;
		var repwd=document.getElementById("repwd").value;

		if(pwd)
		{
			var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
			if(re.test(pwd))
			{
				if(pwd==repwd)
				{
					document.getElementById("pwd_err").innerHTML="";
					document.getElementById("re_pwd_err").innerHTML="";
					return true;
				}
				else
				{
					document.getElementById("re_pwd_err").innerHTML="Passwords are not matching";

					document.getElementById("repwd").value="";
					document.getElementById("pwd").focus();
					return false;
				}
			}
			else
			{
					document.getElementById("pwd").focus();
					document.getElementById("pwd").value="";
					return false;
			}
		}
		else
		{
			document.getElementById("re_pwd_err").innerHTML="Password fields cannot be empty";
			return false;
		}
	}
</script>
</head>
<body class="body">

<header class="mainHeader">Savings Planner</header>

<div class="mainContent">
	<div class="about_new_user">
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
	<aside class="sep"><pre>                                           </pre></aside>
	<aside class="sign_up">
		<header><h2 class="header_for_topic">Sign Up</h2></header>
		<content>
		<form onsubmit="return validate()" action="NewUserEntry.php" method="post">

		<input type="text" placeholder="Firstname" id="fname" name="fname" required>
		<content id="fname_err" class="error"></content><br><br>

		<input type="text" placeholder="Lastname" id="lname" name="lname" required>
		<content id="lname_err" class="error"></content><br><br>

		<input placeholder="Date Of Birth" class="textbox-n" type="text" onfocus="(this.type='date')" name="dob" id="dob">
		<content id="dob_err" class="error"></content><br><br>

		<content class="gender" style="font-size:150%;color:black;">Gender:</content>&nbsp&nbsp&nbsp
		<input id="Male" type="radio" name="gender" value="Male" checked><label class="gender" for="Male">Male</label>
		<input id="Female" type="radio" name="gender" value="Female"><label class="gender" for="Female">Female</label><br><br>

		<input type="text" placeholder="Working Institution" id="insti" name="insti" required>
		<content id="insti_err" class="error"></content><br><br>

		<input type="text" placeholder="Mail Address" id="mail" name="mail" required>
		<content id="mail_err" class="error"></content><br><br>

		<input type="password" id="pwd" name="pwd" placeholder="Password" required><br>
		<content class="error" id="pwd_err">Min 6 characters with atleast 1 character in [a-z], [A-Z] and [0-9]</content><br><br>

		<input type="password" placeholder="Re-Type Password" id="repwd" name="repwd" required>&nbsp&nbsp&nbsp<br>
		<content class="error" id="pwd_err">Min 6 characters with atleast 1 character in [a-z], [A-Z] and [0-9]</content><br><br>

		<input type="submit" name="submit" value="Submit Form">
		</form>
		</content>
	</aside>
</div>

</body>
</html>
