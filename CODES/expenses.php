<?php
	session_start();
	$usrname=$_SESSION['usrname'];
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
	$month=date("m");
	$yr=date("Y");
  if($database_connect)
  {
		$sql="SELECT * FROM expenses WHERE Email='$usrname' AND Month='$month' AND Year='$yr'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
      $count=mysqli_num_rows($result);
      if($count==0)
      {
				$rent=0;
				$grocery=0;
				$milk=0;
				$electricity=0;
				$petrol=0;
				$travel=0;
				$gas=0;
				$telephone=0;
				$mobile=0;
				$tax=0;
				$fee=0;
				$medical=0;
				$emi=0;
				$investments=0;
				$pocket_money=0;
				$celebrations=0;
				$household=0;
				$movies=0;
				$petty=0;
				$others=0;
				$total=0;
				$salary=0;
			}

			else if($count==1)
			{
				$row=mysqli_fetch_assoc($result);
				if($row)
				{
					$rent=$row['Rent'];
					$grocery=$row['Grocery'];
					$milk=$row['Milk'];
					$electricity=$row['Electricity'];
					$petrol=$row['Petrol'];
					$travel=$row['Travel'];
					$gas=$row['Gas'];
					$telephone=$row['Telephone'];
					$mobile=$row['Mobile'];
					$tax=$row['Tax'];
					$fee=$row['Fee'];
					$medical=$row['Medical'];
					$emi=$row['EMI'];
					$investments=$row['Investment'];
					$pocket_money=$row['Pocket_Money'];
					$celebrations=$row['Celebration'];
					$household=$row['Household'];
					$movies=$row['Movies'];
					$petty=$row['Petty'];
					$others=$row['Other'];
					$total=$row['Total'];
					$salary=$row['Salary'];
				}
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
</head>

<body class="body">
<form method="POST" action="expense_entry.php">
<table class="table">
<tr><td colspan='3' class='text'><b><?php echo $month.", ".$yr ?></b></td></tr>
<tr><td colspan='3' class='text'>Use this table to enter your monthly expenses. Updations shall be made as when necessary for this month
	and to make changes for previous months visit Updation tab. Alter Salary Details and your Savings in About Youself Tab.
Check in the boxes to deduce the amount from savings rather than the salary amount. <br><b>NOTE: Only amount detucted from this month's salary is displayed here.
If the boxes were checked to detuct from the savings, the corresponding entry will be '0' only.<b></td></tr>

<tr>
  <td class='text'>Salary/Income</td>
  <?php echo "<td class='text'><input type='number' name='salary' id='salary' value='$salary'></td>";?>
</tr>

<tr>
  <td class='text'>Rent</td>
  <?php echo "<td class='text'><input type='number' name='rent' id='rent' value='$rent'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Rent"></center></td>
</tr>

<tr>
  <td class='text'>Grocery</td>
  <?php echo "<td class='text'><input type='number' name='grocery' id='grocery' value='$grocery'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Grocery"></center></td>
</tr>

<tr>
  <td class='text'>Milk Expenses</td>
  <?php echo "<td class='text'><input type='number' name='milk' id='milk' value='$milk'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Milk"></center></td>
</tr>

<tr>
  <td class='text'>Electricity Bill</td>
  <?php echo "<td class='text'><input type='number' name='electricity' id='electricity' value='$electricity'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Electricity"></center></td>
</tr>

<tr>
  <td class='text'>Petrol Expenses</td>
  <?php echo "<td class='text'><input type='number' name='petrol' id='petrol' value='$petrol'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Petrol"></center></td>
</tr>

<tr>
  <td class='text'>Travel Expenses</td>
  <?php echo "<td class='text'><input type='number' name='travel' id='travel' value='$travel'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Travel"></center></td>
</tr>

<tr>
  <td class='text'>Gas Expense</td>
  <?php echo "<td class='text'><input type='number' name='gas' id='gas' value='$gas'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Gas"></center></td>
</tr>

<tr>
  <td class='text'>Telephone and Broadband Bill</td>
  <?php echo "<td class='text'><input type='number' name='telephone' id='telephone' value='$telephone'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Telephone"></center></td>
</tr>

<tr>
  <td class='text'>Mobile Top-Ups, Rate Cutters and Data Packs</td>
  <?php echo "<td class='text'><input type='number' name='mobile' id='mobile' value='$mobile'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Mobile"></center></td>
</tr>

<tr>
  <td class='text'>Taxes Paid</td>
  <?php echo "<td class='text'><input type='number' name='tax' id='tax' value='$tax'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Tax"></center></td>
</tr>

<tr>
  <td class='text'>Fee towards education</td>
  <?php echo "<td class='text'><input type='number' name='fee' id='fee' value='$fee'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Fee"></center></td>
</tr>

<tr>
  <td class='text'>Medical Expenses</td>
  <?php echo "<td class='text'><input type='number' name='medical' id='medical' value='$medical'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Medical"></center></td>
</tr>

<tr>
  <td class='text'>EMI Amount</td>
  <?php echo "<td class='text'><input type='number' name='emi' id='emi' value='$emi'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="EMI"></center></td>
</tr>

<tr>
  <td class='text'>Investments</td>
  <?php echo "<td class='text'><input type='number' name='investments' id='investments' value='$investments'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Investment"></center></td>
</tr>

<tr>
  <td class='text'>Pocket Money</td>
  <?php echo "<td class='text'><input type='number' name='pocket_money' id='pocket_money' value='$pocket_money'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Pocket_Money"></center></td>
</tr>

<tr>
  <td class='text'>Vacation/Festival Celebrations</td>
  <?php echo "<td class='text'><input type='number' name='celebrations' id='celebrations' value='$celebrations'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Celebration"></center></td>
</tr>

<tr>
  <td class='text'>Buying Household items</td>
  <?php echo "<td class='text'><input type='number' name='household' id='household' value='$household'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Household"></center></td>
</tr>

<tr>
  <td class='text'>Movies and Entertainments</td>
  <?php echo "<td class='text'><input type='number' name='movies' id='movies' value='$movies'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Movies"></center></td>
</tr>

<tr>
  <td class='text'>Miscellaneous Expenses</td>
  <?php echo "<td class='text'><input type='number' name='petty' id='petty' value='$petty'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Petty"></center></td>
</tr>

<tr>
  <td class='text'>Other Expenses</td>
  <?php echo "<td class='text'><input type='number' name='others' id='others' value='$others'></td>";?>
	<td><center><input type="checkbox" name="detuct[]" value="Other"></center></td>
</tr>

<tr>
  <td class='text'>Total Expenses</td>
  <?php echo "<td class='text' style='font-size:200%;'><b>".$total."</b></td>";?>
</tr>
<tr>

	<tr>
	  <td class='text'>Amount Left</td>
	  <?php echo "<td class='text' style='font-size:200%;'><b>".($salary-$total)."</b></td>";?>
	</tr>
	<tr>


<tr>
	<td colspan='3' class='text'><input type='submit' name='submit' value='Submit Expenses'></td>
</tr>
</table>
</form>
</body>
</html>
