<?php
	session_start();
	$usrname=$_SESSION['usrname'];
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
	$month=date("m");
	$yr=date("Y");
  if($database_connect)
  {
		$sql="SELECT * FROM userdetails WHERE Email='$usrname'";
    $result=mysqli_query($connection,$sql);
    if($result)
		{
      $count=mysqli_num_rows($result);
      if($count==0)
				$savings=0;
			else if($count==1)
			{
				$row=mysqli_fetch_assoc($result);
				if($row)
					$savings=$row['Savings'];
					$sal_sav=$row['SalarySavings'];
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Savings Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
  <script>
    function pwd_validate()
    {
      var pwd=document.getElementById('pwd').value;
      var repwd=document.getElementById('repwd').value;
      if(pwd)
  		{
  			var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
  			if(re.test(pwd))
  			{
  				if(pwd==repwd)
  				    return true;
  				else
  				{
  					window.alert("Passwords are not matching");
  					document.getElementById("repwd").value="";
            document.getElementById("pwd").value="";
  					document.getElementById("pwd").focus();
  					return false;
  				}
  			}
  			else
  			{
            window.alert("The password must have atleast 6 characters with atleast 1 character in [a-z], [A-Z] and [0-9]")
  					document.getElementById("pwd").focus();
  					document.getElementById("pwd").value="";
            document.getElementById("repwd").value="";
  					return false;
  			}
  		}
  		else
  		{
  			window.alert("Password fields cannot be empty");
  			return false;
  		}

    }
  </script>
</head>

<body>
<?php
	echo "<table class='table'><tr>";
  echo "<td class='text'>Name:</td><td class='text'>".$_SESSION['name']."</td></tr>" ;
  echo "<td class='text'>Date Of Birth:</td><td class='text'>".$_SESSION['dob']."</td></tr>" ;
  echo "<td class='text'>Gender:</td><td class='text'>".$_SESSION['sex']."</td></tr>" ;
  echo "<td class='text'>Age:</td><td class='text'>".(date('Y')-$_SESSION['year'])." years</td></tr>" ;
	echo "<td class='text'>Working Institution:</td><td class='text'>".$_SESSION['insti']."</td></tr>" ;
  echo "<td class='text'>Change Password:<br></td>";
?>

<td>
<form onsubmit="return pwd_validate()" method="POST" action="change_pwd.php">
  <input type="password" name="old_pwd" id="old_pwd" placeholder="Old Password">&nbsp&nbsp&nbsp<b class='error'>Min 6 characters with atleast 1 character in [a-z], [A-Z] and [0-9]</b><br><br>
  <input type="password" name="pwd" id="pwd" placeholder="New Password">&nbsp&nbsp&nbsp&nbsp
  <input type="password" name="repwd" id="repwd" placeholder="Retype New Password">&nbsp&nbsp&nbsp&nbsp
  <input type="submit" value="Change Password" name="submit">
</form>
</td>
</tr>

<tr>
	<td class='text'>Savings</td>
	<form method="POST" action="savings.php">
		<?php echo "<td class='text'><input type='number' name='savings' value='$savings'>";?>&nbsp&nbsp&nbsp
		<input type="submit" value="Submit" name="submit"></td>
	</form>
</tr>

<tr>
	<td class='text'>Salary Savings</td>
	<form method="POST" action="savings.php">
		<?php echo "<td class='text'><b>".$sal_sav."</b></td>";?>&nbsp&nbsp&nbsp
	</form>
</tr>

</table>
</body>
</html>
