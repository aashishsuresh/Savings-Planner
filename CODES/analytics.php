<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Savings Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
  session_start();
  $usrname=$_SESSION['usrname'];
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  $month=date("m");
	$yr=date("Y");
  $sql="SELECT * FROM expenses WHERE Email='$usrname' AND Month='$month' AND Year='$yr'";
  $result=mysqli_query($connection,$sql);
  $row=mysqli_fetch_assoc($result);
  if($row)
  {
    $grocery=$row['Grocery'];
    $electricity=$row['Electricity'];
    $travel=$row['Travel'];
    $telephone=$row['Telephone'];
    $mobile=$row['Mobile'];
    $investments=$row['Investment'];
    $celebrations=$row['Celebration'];
    $household=$row['Household'];
    $movies=$row['Movies'];
    $petty=$row['Petty'];
    $others=$row['Other'];
    $salary=$row['Salary'];
  }

  $grocery_per=($grocery/$salary)*100;
  $electricity_per=($electricity/$salary)*100;
  $travel_per=($travel/$salary)*100;
  $telephone_per=($telephone/$salary)*100;
  $mobile_per=($mobile/$salary)*100;
  $investments_per=($investments/$salary)*100;
  $celebrations_per=($celebrations/$salary)*100;
  $household_per=($household/$salary)*100;
  $movies_per=($movies/$salary)*100;
  $petty_per=($petty/$salary)*100;
  $others_per=($others/$salary)*100;
  $flag=0;
  echo '<b><span class="text">Areas to reduce expenditure:</span></b><BR><ul>';
  if($electricity > 10000 || $electricity_per > 10){
	 echo '<li><span class="analytics_text">Electricity</span></li><BR>';
   $flag=1;
  }
    if($travel_per > 5){
	 echo '<li><span class="analytics_text"><span class="analytics_text">Travel</span></li><BR>';
   $flag=1;
  }
    if($telephone_per > 2){
	 echo '<li><span class="analytics_text">Telephone Bill</span></li><BR>';
   $flag=1;
  }
    if($mobile_per > 1){
	 echo '<li><span class="analytics_text">Mobile Phone Bill</span></li><BR>';
   $flag=1;
  }
    if($celebrations_per > 10){
	 echo '<li><span class="analytics_text">Party Celebrations</span></li><BR>';
   $flag=1;
  }
    if($household_per > 10){
	 echo '<li><span class="analytics_text">HoudeHold Item purchase</span></li><BR></span></li>';
   $flag=1;
  }
    if($movies_per > 3){
	 echo '<li><span class="analytics_text">Movies expenditure</span></li><BR>';
   $flag=1;
  }
    if($petty_per > 20){
	 echo '<li><span class="analytics_text">Miscellaneous</span></li><BR>';
   $flag=1;
  }
if($flag==0)
  echo '<li><span class="analytics_text">You are spending wisely. Good Job!</span></li>';
  echo "</ul>";
 echo ('<b><span class="text"><BR>Areas you can spend more:</span></B><BR><ul>');
 $flag = 0;
if($grocery_per < 5 && $grocery_per > 0){
	 echo '<li><span class="analytics_text">Groceries</span></li><BR>';
   $flag = 1;
  }
    if($travel_per < 5 && $travel_per > 0){
	 echo '<li><span class="analytics_text">Travel</span></li><BR>';
   $flag = 1;
  }
      if($movies_per < 5 && $movies_per > 0){
	 echo '<li><span class="analytics_text">Movies</span></li><BR>';
   $flag = 1;
  }
      if($celebrations_per < 5 && $celebrations_per > 0){
	 echo '<li><span class="analytics_text">Party Expenditure</span></li><BR>';
   $flag = 1;
  }
  if($flag == 0){
    echo '<li><span class="analytics_text">You have proper financial management</span></li><BR>';
  echo "</ul>";
  }

?>
</body></html>
