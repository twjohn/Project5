<!--
CONNER KELTY - TYLER JOHNSTON - VENANCIO DA SILVA
Dec 1st
CSC 390
Project 5
indexMain.php
-->


<?php

	//session_start();
include("history.php");
 ?>



<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>indexMain.php</title>
  <link rel="stylesheet" href="css/styleIndex.css">
  <script src="gameActions.js"></script>
</head>

<form method="post" action="basicActions.php">
<button style="border-color: #178aff" id="backButtons" type="submit" name="tostatsPageBtn"> <a> View Statistics </a> </button>
</form>

<h1 class="p2h1">The Clock Game</h1>

<hr />

<body>
<p id="test">
</p>
    <div class="center" style="font-size: 30px; display:none;"id="SHOWplayAgainBtn">
        <button id="backButtons" style="font-size: 28px;border-color: #ff0000" onclick="playAgainBtnPressed()"> Play Again </button>
    </div>

  <div class="center" style="font-size: 30px;" id="clockdiv"> </div>

    <div class="center" style="font-weight: bolder; font-size: 26px;"id="displayWinOrLose"> </div>

  <br>

  <div class="center" style="font-size: 30px; display:none;"id="SHOWpriceInput">

       Price :<input type="number" id="GuessedPrice" >
	   
       <button id="backButtons" style="font-size: 28px;border-color: #ff0000" onclick="submitPriceBtnPressed()"> Submit </button>
	   

       <br>

       <div class="center" style="font-weight: bolder; font-size: 26px;"id="displayInput"> </div>
       <div class="center" style="font-weight: bolder; font-size: 22px;"id="displayHint"> </div>

       <table border="6" bgcolor="#b1b1b1" width="30%" align="center">

           <tr>
             <th> Guess History </th>
           </tr>

           </thead>

           <tbody id="resultCheck">

         </table>
  </div>

  <br>

  <div class="center" style="display:none;" id="SHOWFinalResults">

    <h1>Final Results</h1>

  <table border="6" bgcolor="#b1b1b1" width="50%" align="center">

      <tr>
        <th>Result</th>
        <th># Of Guesses</th>
        <th>Time Left</th>
      </tr>

      </thead>

      <tbody id="finalResults">

    </table>

<div class="center" style="font-weight: bolder; font-size: 22px;"id="displayPrice"> </div>

</div>

<div id="displayGetPrizeBtn" class="center">


<button id="backButtons" style="font-size: 24px;border-color: #1cff00" onclick="getPrizeBtnPressed();" name = "myPrize"> Get Prize </button>



</div>

<div class="center" style="display:none;" id="SHOWPrize">

  <div class="center" style="font-weight: bolder; font-size: 26px;"id="displayPrize"> </div>

      <img id="PrizeImage" src='' width="100px" height="120px" style="" >
</div>


<div>

</div>

  </body>



<body>
	<div id="HIDEStartBtn" class="center">

		<button id="p2actionButtons" onclick="startBtnPressed()"> Start The Clock! </button>

	</div>

</body>

</html>
