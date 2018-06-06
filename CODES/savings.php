<?php
session_start();
$usrname=$_SESSION['usrname'];
if(isset($_POST['submit']))
{
  $savings=$_POST['savings'];
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  if($database_connect)
  {
    $sql="UPDATE userdetails SET Savings='$savings' WHERE Email='$usrname'";
    $result=mysqli_query($connection,$sql);
    if($result)
      echo "<script>alert('Savings Updated');</script>";
  }
}
