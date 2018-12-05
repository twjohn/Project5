<!--
CONNER KELTY - TYLER JOHNSTON - VENANCIO DA SILVA
Dec 1st
CSC 390
Project 5
statsPage.php
-->

<?php

include("stats.php");
$stats = new stats();
	//session_start();

 ?>




<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>statsPage.php</title>
  <link rel="stylesheet" href="css/styleIndex.css">

</head>


<form method="post" action="basicActions.php">
<button id="backButtons" type="submit" name="toindexMainBtn"> <a> Back </a> </button>
</form>


<h1 class="p2h1">My Statistics</h1>

<hr />

<body>

	<div style="font-size: 28px;font-weight: bold;display:table; margin:40px auto;" class="center">

    <h3 class="p2h1">Number of Games Won and Lost</h3>
	<?php
	$stats->getWinLoss();
	?>
    <hr />

	  <h3 class="p2h1">Average Number of Guesses</h3>
	<?php
	$stats->getAvgGuesses();
	?>
    <!-- Highest number of guesses used in a game -->
    <hr />

    <h3 class="p2h1">Fastest Guess</h3>
	<?php
	$stats->getFastestTime();
	?>

    <hr />

	</div>

</body>

<body>


<!-- Use table to display stats? -->

</body>


</html>
