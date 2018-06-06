<?php
header('Content-Type: application/json');
$con = mysqli_connect("localhost","root","","savingsplanner");
// Check connection

if(mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}
else
{
	session_start();
	$usrname=$_SESSION['usrname'];
	$month=date("m");
	$yr=date("Y");
    $data_points = array();
		$sql="SELECT * FROM expenses WHERE Email='$usrname' AND Month='$month' AND Year='$yr'";
    $result = mysqli_query($con,$sql);
    //get number of rows returned
    $num_results = $result->num_rows;
    if($num_results == 1)
    {
      $row=mysqli_fetch_assoc($result);
        $point = array("label" => 'Rent' , "y" => $row['Rent']);
        array_push($data_points, $point);
        $point = array("label" => 'Grocery' , "y" => $row['Grocery']);
        array_push($data_points, $point);
        $point = array("label" => 'Milk' , "y" => $row['Milk']);
        array_push($data_points, $point);
        $point = array("label" => 'Electricity' , "y" => $row['Electricity']);
        array_push($data_points, $point);
        $point = array("label" => 'Petrol' , "y" => $row['Petrol']);
        array_push($data_points, $point);
        $point = array("label" => 'Travel' , "y" => $row['Travel']);
        array_push($data_points, $point);
        $point = array("label" => 'Telephone' , "y" => $row['Telephone']);
        array_push($data_points, $point);
        $point = array("label" => 'Mobile' , "y" => $row['Mobile']);
        array_push($data_points, $point);
        $point = array("label" => 'Tax' , "y" => $row['Tax']);
        array_push($data_points, $point);
        $point = array("label" => 'Fee' , "y" => $row['Fee']);
        array_push($data_points, $point);
        $point = array("label" => 'Medical' , "y" => $row['Medical']);
        array_push($data_points, $point);
        $point = array("label" => 'EMI' , "y" => $row['EMI']);
        array_push($data_points, $point);
        $point = array("label" => 'Investment' , "y" => $row['Investment']);
        array_push($data_points, $point);
        $point = array("label" => 'Pocket_Money' , "y" => $row['Pocket_Money']);
        array_push($data_points, $point);
        $point = array("label" => 'Celebration' , "y" => $row['Celebration']);
        array_push($data_points, $point);
        $point = array("label" => 'Household' , "y" => $row['Household']);
        array_push($data_points, $point);
        $point = array("label" => 'Movies' , "y" => $row['Movies']);
        array_push($data_points, $point);
        $point = array("label" => 'Petty' , "y" => $row['Petty']);
        array_push($data_points, $point);
        $point = array("label" => 'Other' , "y" => $row['Other']);
        array_push($data_points, $point);
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
}
?>
