<?php
	session_start();
?>
<pre>           </pre>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Savings Planner</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		function load(link)
		{
			document.getElementById('f1').src=link+".php";
		}
</script>
</head>

<body class="body">

<header class="mainHeader">Savings Planner</header>


<nav  class="navi"><ul class="navi">
	<li><a href="#" onclick="load('about')">About Yourself</a></li>
	<li><a href="#" onclick="load('expenses')">Expense Entry</a></li>
	<li><a href="#" onclick="load('render')">Reports</a></li>
	<li><a href="#" onclick="load('analytics')">Analytics</a></li>
	<li><a href="#" onclick="load('updation')">Updations</a></li>
	<li><a href='logout.php'>Log Out</a></li>
</ul></nav>


<div class="frames">
	<iframe frameborder="0" id="f1" src="about.php" height="100%" width="100%"> </iframe>
</div>

</body>
</html>
