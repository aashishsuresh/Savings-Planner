<?php
  session_start();
  $usrname=$_SESSION['usrname'];
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Savings Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class='body'>

  <form action="updationEntry.php" method="POST" ><center>
    <br><input type='password' name='compare' placeholder='Enter Password to alter details'><br><br>
    <span style="font-face:Sans Serif; font-size:150%;">Year:&nbsp&nbsp</span>
    <select name='years'>
    <?php
      for($i=2016;$i<=date("Y");$i++)
      {
        echo "<option value=$i>$i</option>";
      }
      ?>
    </select><br><br>
    <span style="font-face:Sans Serif; font-size:150%;">Month:&nbsp&nbsp</span>
    <select name='months'>
    <?php
      for($i=1;$i<=12;$i++)
      {
        echo "<option value=$i>$i</option>";
      }
      ?>
    </select><br><br>
  <select name='expenses'>
    <option value='Rent'>Rent</option>
    <option value='Grocery'>Grocery</option>
    <option value='Milk'>Milk</option>
    <option value='Electricity'>Electricity</option>
    <option value='Petrol'>Petrol</option>
    <option value='Travel'>Travel</option>
    <option value='Gas'>Gas</option>
    <option value='Television'>Television</option>
    <option value='Mobile'>Mobile</option>
    <option value='Tax'>Tax</option>
    <option value='Fee'>Fee</option>
    <option value='Medical'>Medical</option>
    <option value='EMI'>EMI</option>
    <option value='Investment'>Investment</option>
    <option value='Pocket_Money'>Pocket Money</option>
    <option value='Celebration'>Celebration</option>
    <option value='Household'>Household Expenses</option>
    <option value='Movies'>Movies</option>
    <option value='Petty'>Miscellaneous Expenses</option>
    <option value='Other'>Other Expenses</option>
  </select><br><br>
  <input type='number' name='amount' value="0" placeholder='Enter the amount'>
  <input type='submit' value='Update' name="submit">
<center></form>
</body>
</html>
