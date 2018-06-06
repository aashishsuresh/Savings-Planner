<?php
session_start();
if(isset($_POST['submit']))
{
  $usrname=$_SESSION['usrname'];
  $pwd=$_POST['compare'];
  $months=$_POST['months'];
  $years=$_POST['years'];
  $expenses=$_POST['expenses'];
  $amount=$_POST['amount'];
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  if($database_connect)
  {
    $sql="SELECT * FROM userdetails WHERE Email='$usrname' AND Password='$pwd'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
      $count=mysqli_num_rows($result);
      if($count==1)
      {
          $sql="SELECT * FROM expenses WHERE Email='$usrname' AND Month='$months' AND Year='$years'";
          $result=mysqli_query($connection,$sql);
          $row=mysqli_fetch_assoc($result);
          $count=mysqli_num_rows($result);
          if($count==1)
          {
            $total=$row['Total'];
            $sal=$row['Salary'];
            $sal=$sal-$total;
            $total=$total-$row[$expenses]+$amount;
            $sql="UPDATE expenses SET Total='$total', $expenses='$amount' WHERE Email='$usrname' AND Year='$years' AND Month='$months'";
            $sqla="UPDATE userdetails SET SalarySavings='$sal' WHERE Email='$usrname'";
            $result=mysqli_query($connection,$sql);
            $resulta=mysqli_query($connection,$sqla);
              if($result && $resulta)
                echo "<script>alert('Change in Expenditure Updated');</script>";
            }
          }
          else
            echo "<script>alert('You can make changes only to previous months from when you have been using our webpage');</script>";
      }
      else
          echo "<script>window.alert('Invalid Password');</script>";
    }
  }
?>
