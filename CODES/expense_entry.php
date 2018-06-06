<?php
session_start();
$usrname=$_SESSION['usrname'];
if(isset($_POST['submit']))
{
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  if($database_connect)
  {
    $min=0;
    if(isset($_POST['detuct'])){
    $todetuct=$_POST['detuct'];
    if(in_array("Rent",$todetuct))
    {
      $rent=0;
      $min=$min+$_POST['rent'];
    }
    else $rent=$_POST['rent'];

    if(in_array("Grocery",$todetuct))
    {
      $grocery=0;
      $min=$min+$_POST['grocery'];
    }
    else $grocery=$_POST['grocery'];

    if(in_array("Milk",$todetuct))
    {
      $milk=0;
      $min=$min+$_POST['milk'];
    }
    else $milk=$_POST['milk'];

    if(in_array("Electricity",$todetuct))
    {
      $electricity=0;
      $min=$min+$_POST['electricity'];
    }
    else $electricity=$_POST['electricity'];

    if(in_array("Petrol",$todetuct))
    {
      $petrol=0;
      $min=$min+$_POST['petrol'];
    }
    else $petrol=$_POST['petrol'];

    if(in_array("Travel",$todetuct))
    {
      $travel=0;
      $min=$min+$_POST['travel'];
    }
    else $travel=$_POST['travel'];

    if(in_array("Gas",$todetuct))
    {
      $gas=0;
      $min=$min+$_POST['gas'];
    }
    else $gas=$_POST['gas'];

    if(in_array("Telephone",$todetuct))
    {
      $telephone=0;
      $min=$min+$_POST['telephone'];
    }
    else $telephone=$_POST['telephone'];

    if(in_array("Mobile",$todetuct))
    {
      $mobile=0;
      $min=$min+$_POST['mobile'];
    }
    else $mobile=$_POST['mobile'];

    if(in_array("Tax",$todetuct))
    {
      $tax=0;
      $min=$min+$_POST['tax'];
    }
    else $tax=$_POST['tax'];

    if(in_array("Fee",$todetuct))
    {
      $fee=0;
      $min=$min+$_POST['fee'];
    }
    else $fee=$_POST['fee'];

    if(in_array("Medical",$todetuct))
    {
      $medical=0;
      $min=$min+$_POST['medical'];
    }
    else $medical=$_POST['medical'];

    if(in_array("EMI",$todetuct))
    {
      $emi=0;
      $min=$min+$_POST['emi'];
    }
    else $emi=$_POST['emi'];

    if(in_array("Investment",$todetuct))
    {
      $investments=0;
      $min=$min+$_POST['investments'];
    }
    else $investments=$_POST['investments'];

    if(in_array("Pocket_Money",$todetuct))
    {
      $pocket_money=0;
      $min=$min+$_POST['pocket_money'];
    }
    else $pocket_money=$_POST['pocket_money'];

    if(in_array("Celebration",$todetuct))
    {
      $celebrations=0;
      $min=$min+$_POST['celebrations'];
    }
    else $celebrations=$_POST['celebrations'];

    if(in_array("Household",$todetuct))
    {
      $household=0;
      $min=$min+$_POST['household'];
    }
    else $household=$_POST['household'];

    if(in_array("Movies",$todetuct))
    {
      $movies=0;
      $min=$min+$_POST['movies'];
    }
    else $movies=$_POST['movies'];

    if(in_array("Petty",$todetuct))
    {
      $petty=0;
      $min=$min+$_POST['petty'];
    }
    else $petty=$_POST['petty'];

    if(in_array("others",$todetuct))
    {
      $others=0;
      $min=$min+$_POST['others'];
    }
    else $others=$_POST['others'];
  }
  else {
    $rent=$_POST['rent'];
    $grocery=$_POST['grocery'];
    $milk=$_POST['milk'];
    $electricity=$_POST['electricity'];
    $petrol=$_POST['petrol'];
    $travel=$_POST['travel'];
    $gas=$_POST['gas'];
    $telephone=$_POST['telephone'];
    $mobile=$_POST['mobile'];
    $tax=$_POST['tax'];
    $fee=$_POST['fee'];
    $medical=$_POST['medical'];
    $emi=$_POST['emi'];
    $investments=$_POST['investments'];
    $pocket_money=$_POST['pocket_money'];
    $celebrations=$_POST['celebrations'];
    $household=$_POST['household'];
    $movies=$_POST['movies'];
    $petty=$_POST['petty'];
    $others=$_POST['others'];
    }
    $salary=$_POST['salary'];
    $yr=date("Y");
    $month=date("m");
    $total=$rent+$grocery+$milk+$electricity+$petrol+$travel+$gas+$telephone+$mobile+$tax+$fee+$medical+$emi+$investments+$pocket_money+$celebrations+$household+$movies+$petty+$others;
    $sql="SELECT * FROM expenses WHERE Email='$usrname' AND Month='$month' AND Year='$yr'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
      $count=mysqli_num_rows($result);
      $sql="SELECT * FROM userdetails WHERE Email='$usrname'";
      $result=mysqli_query($connection,$sql);
      if($result)
      {
        $row=mysqli_fetch_assoc($result);
        $sal_sav=$row['SalarySavings'];
        $sav=$row['Savings'];
      }
      $sal_sav=$sal_sav+$salary-$total;
      $sav=$sav-$min;
      if($count==0)
      {
        $sql="INSERT INTO expenses VALUES('$usrname','$month','$yr','$salary','$rent','$grocery','$milk','$electricity','$petrol','$travel',
          '$gas','$telephone','$mobile','$tax','$fee','$medical','$emi','$investments','$pocket_money','$celebrations','$household','$movies','$petty','$others','$total')";
        $sql_a="UPDATE userdetails SET SalarySavings='$sal_sav', Savings='$sav' WHERE Email='$usrname'";
        if(mysqli_query($connection,$sql) && mysqli_query($connection,$sql_a))
          echo "<script>alert('Monthy Expenses Entered');</script>";
      }
      else if($count==1)
      {
        $sql="UPDATE expenses SET Email='$usrname',Month='$month',Year='$yr',Salary='$salary',Rent='$rent',Grocery='$grocery',Milk='$milk',Electricity='$electricity',Petrol='$petrol',Travel='$travel',
          Gas='$gas',Telephone='$telephone',Mobile='$mobile',Tax='$tax',Fee='$fee',Medical='$medical',EMI='$emi',Investment='$investments',Pocket_Money='$pocket_money',Celebration='$celebrations',
          Household='$household',Movies='$movies',Petty='$petty',Other='$others',Total='$total' WHERE Email='$usrname' AND Year='$yr' AND Month='$month'";
        $sql_a="UPDATE userdetails SET SalarySavings='$sal_sav', Savings='$sav' WHERE Email='$usrname'";
          if(mysqli_query($connection,$sql) && mysqli_query($connection,$sql_a))
              echo "<script>alert('Monthy Expenses Updated');</script>";
      }
  }
}
}
?>
