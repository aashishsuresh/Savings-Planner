<?php
if(isset($_POST['submit']))
{
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  if($database_connect)
  {
    $usrname=stripslashes($_POST['usrname']);
    $pwd=stripslashes($_POST['pwd']);
    $sql="SELECT * FROM userdetails WHERE Email='$usrname' and Password='$pwd'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
      $count=mysqli_num_rows($result);
      if($count==1)
      {
        session_start();
        $_SESSION["usrname"]=$usrname;
        $result="SELECT * FROM userdetails WHERE Email='$usrname' and Password='$pwd'";
        $query= mysqli_query($connection,$result);
        $row=mysqli_fetch_assoc($query);
        $_SESSION["name"]=$row['FirstName']." ".$row['LastName'];
        $_SESSION["dob"]=$row['DateOfBirth'];
        $_SESSION["sex"]=$row['Gender'];
        $_SESSION["insti"]=$row['Working Institution'];
        $array=explode("-",$_SESSION["dob"]);
        $_SESSION["year"]=$array[0];
        header("location:User_Home.php");
      }
      else
        echo "<script>window.alert('Improper login details');
        window.location.href='index.php';
        </script>";
    }
  }
}
?>
