<?php
	if(isset($_POST['submit']))
	{
		$connection=mysqli_connect('localhost','root','');
		$database_connect=mysqli_select_db($connection,'savingsplanner');
		if($database_connect)
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$gender=$_POST['gender'];
			$insti=$_POST['insti'];
			$dob=$_POST['dob'];
			$pwd=stripslashes($_POST['pwd']);
			$mail=stripslashes($_POST['mail']);
			$sql="SELECT * FROM userdetails WHERE Email='$mail'";
			$result=mysqli_query($connection,$sql);
			if($result)
	    {
	      $count=mysqli_num_rows($result);
	      if($count==0)
	      {
					$sql="INSERT INTO userdetails VALUES('$fname','$lname','$gender','$insti','$dob','$pwd','$mail',0,0)";
					if(mysqli_query($connection,$sql))
					{
						echo "<script>alert('Succesfully Signed Up');
						window.location.href='index.php';
						</script>";
					}
					else {
						echo 'error in insertion';
					}
				}
				else
				{
					echo "<script>alert('User already exists');
					window.location.href='newuser.php';
					</script>";
				}
			}
	}
}
?>
