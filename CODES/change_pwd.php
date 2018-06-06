<?php
  session_start();
	if(isset($_POST['submit']))
	{
		$connection=mysqli_connect('localhost','root','');
		$database_connect=mysqli_select_db($connection,'savingsplanner');
		if($database_connect)
		{
      $oldpwd=$_POST['old_pwd'];
      $pwd=$_POST['pwd'];
      $repwd=$_POST['repwd'];
      $usrname=$_SESSION['usrname'];
      $sql="SELECT * FROM userdetails WHERE Email='$usrname' and Password='$oldpwd'";
      $result=mysqli_query($connection,$sql);
      if($result)
      {
        $count=mysqli_num_rows($result);
        if($count==1)
        {
          $sql="UPDATE userdetails SET password='$pwd' WHERE Email='$usrname'";
          $result=mysqli_query($connection,$sql);
          if($result)
          {
            echo "<script>alert('Password Updated');</script>";
          }
        }
        else
        {
          echo "<script>alert('Improper Old Password');</script>";
        }
      }
    }
  }

?>
