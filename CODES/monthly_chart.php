<!doctype html>
<html>
<head>
    <title>Pie Chart Demo (LibChart)- http://codeofaninja.com/</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>

<?php
  $connection=mysqli_connect('localhost','root','');
  $database_connect=mysqli_select_db($connection,'savingsplanner');
  $month=date("m");
  $yr=date("Y");
  if($database_connect)
  {
    //include the library
    include "libchart/libchart/classes/libchart.php";
    //new pie chart instance
    $chart = new PieChart(500,300);
    //data set instance
    $dataSet = new XYDataSet();
    //actual data
    //query all records from the database
    $query = "SELECT * FROM expenses WHERE Email='$usrnname' AND Month='$mnth' AND Year='$yr'";
    //execute the query
    $result = $mysqli->query( $query );
    //get number of rows returned
    $num_results = $result->num_rows;
    if($num_results == 1)
    {
      $row=mysqli_fetch_assoc($result);
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Rent']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Grocery']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Milk']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Electricity']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Petrol']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Travel']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Gas']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Telephone']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Mobile']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Tax']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Fee']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Medical']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['EMI']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Investment']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Pocket_Money']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Celebration']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Household']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Movies']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Petty']));
      $dataSet->addPoint(new Point("{$expenses} {$amount})", $row['Other']));
      //finalize dataset
      $chart->setDataSet($dataSet);
      //set chart title
      $chart->setTitle($month.", ".$yr);
      //render as an image and store under "generated" folder
      $name_of_chart=$usrname."_".$month."_".$yr;
      $chart->render($name_of_chart);
      //pull the generated chart where it was stored
      echo "<img alt='Pie chart'  src='$name_of_chart' style='border: 1px solid gray;'/>";
    }
  }
?>
