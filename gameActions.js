/*
CONNER KELTY - TYLER JOHNSTON - VENANCIO DA SILVA
Dec 1st
CSC 390
Project 5
gameActions.js
*/

//window.onload = function() {};

var win = false;
var numOfGuesses = 0;
var recordedTimeLeft = 0;

var prize;
var priceOfPrize;
var imageSrcName;
// var prize = "Prize";
// var priceOfPrize = 0;

function reqListener() {
      console.log(this.responseText);
    }
    
function startBtnPressed() {

if(prize==null){exit;}
  var x = document.getElementById("HIDEStartBtn");
  x.style.display = "none";

  var y = document.getElementById("SHOWpriceInput");
  y.style.display = "block";

  var z = document.getElementById("SHOWFinalResults");
  z.style.display = "none";

  var z1 = document.getElementById("SHOWplayAgainBtn");
  z1.style.display = "none";

  var z2 = document.getElementById("displayGetPrizeBtn");
  z2.style.display = "none";
  var del = document.getElementById("SHOWpriceInput");

  var timeLeft = 30;

  var elem = document.getElementById("clockdiv");
  var elem2 = document.getElementById("displayHint");
  var elem3 = document.getElementById("displayInput");
  var elem4 = document.getElementById("displayWinOrLose");

  var timerId = setInterval(countdown, 1000);

  function countdown() {
    if (timeLeft == -1) {
      clearTimeout(timerId);

      elem4.innerHTML = '<h3 style="color:red"> YOU LOSE! </h3>' +'<p>The Price was ' +priceOfPrize+'</p>';
	  
      elem.innerHTML = '<h3 style="color:green"></h3>';
	  document.cookie="name = Timmy";
	  document.cookie="result = L";
	  document.cookie="prize ="+prize;
	  document.cookie="prize_price =" +priceOfPrize;
	  document.cookie="guesses_taken ="+numOfGuesses;
	  document.cookie="time_taken ="+30;

      y.style.display = "none";
      z.style.display = "block";
      z1.style.display = "block";
      z2.style.display = "none";
	  del.remove();

      appendFinalTable();

      return;
    }
    if (win == true) {
      clearTimeout(timerId);
      recordedTimeLeft = timeLeft;
      var elemPrizeText2 = document.getElementById("displayPrice");

      elem.innerHTML = '<h3 style="color:green"> YOU WIN! </h3>';

      console.log(z2);

      y.style.display = "none";
      z.style.display = "block";
      z1.style.display = "block";
      
      z2.style.display = "none";

      appendFinalTable();
		
		elemPrizeText2.innerHTML = '<h4 style="color:green"> Price of Prize : ' + priceOfPrize + ' Dollars';
		document.cookie="name = Timmy";
	  document.cookie="result = W";
	  document.cookie="prize ="+prize;
	  document.cookie="prize_price =" +priceOfPrize;
	  document.cookie="guesses_taken ="+numOfGuesses;
	  document.cookie="time_taken ="+(30 - recordedTimeLeft);
      return;
    } else {
      elem.innerHTML =
        '<h3 style="color:#a60f0f"> Time Remaining : ' + timeLeft;
      timeLeft--;
    }
  }
}


function submitPriceBtnPressed() {
  //AJAX "actualPRICE"

  var elem1 = document.getElementById("clockdiv");
  var elem2 = document.getElementById("displayHint");
  var elem3 = document.getElementById("displayInput");
  var PriceInput = document.getElementById("GuessedPrice").value;

  if (PriceInput == "") {
    elem3.innerHTML = '<h3 style="color:red"> Invalid Input </h3>';
    elem2.innerHTML = "";
    return;
  }

  numOfGuesses++;

  var PriceInputParsed = parseFloat(PriceInput);

  //10 will be the variable which holds the actualPRICE
  if (PriceInputParsed == priceOfPrize) {
    elem3.innerHTML = '<h3 style="color:green"> YOU WIN! </h3>';
    elem2.innerHTML = "";
    win = true;
  } else if (PriceInputParsed < priceOfPrize) {
    elem3.innerHTML = "<br> Your Guess : " + PriceInput;
    elem2.innerHTML = '<br> <h3 style="color:red"> Guess HIGHER </h3> <br> ';
  } else if (PriceInputParsed > priceOfPrize) {
    elem3.innerHTML = "<br> Your Guess : " + PriceInput;
    elem2.innerHTML = '<br> <h3 style="color:red"> Guess LOWER </h3> <br> ';
  } else {
    alert("Error");
  }

  addToHistory();
}

function playAgainBtnPressed() {
//THOR
  //window.location='/~keltyco/project5/public/';
//XAMPP
  window.location = "/project5/indexMain.php";
}

function getPrizeBtnPressed() {

//(Sample data) - pull from database and insert into vars
var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "prizeQuery.php";
	var asynch = true;
	
	ajax.open(method, url, asynch);
	ajax.send();
	
	
	ajax.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
		
			//alert(this.responseText);
			var data = JSON.parse(this.responseText);
			//console.log(data);
			
			var html = "";
	
			var randomPrize_id = 0; 
			console.log(randomPrize_id);
				var thePrize_id = data[randomPrize_id].prize_id;		//create a variable to store the prize_id from the db query
				var theTitle = data[randomPrize_id].title;				//as above but for the title
				var theDescription = data[randomPrize_id].description;	//and so on
				var theMin_price = data[randomPrize_id].min_price;
				var theMax_price = data[randomPrize_id].max_price;
				var theImage_url = data[randomPrize_id].image_url;
			prize = theTitle;
			priceOfPrize = Math.floor((Math.random() *  theMax_price) +theMin_price);
			imageSrcName = theImage_url;	
	elemPrizeText1.innerHTML = '<h4 style="color:blue"> Prize : ' + prize ;
	document.getElementById("PrizeImage").src = theImage_url; //sets the image url value of the image in the html portion to that of the url string from the db entry
	
	}}
	
  

  

  var elemPrizeDiv = document.getElementById("SHOWPrize");
  var elemPrizeText1 = document.getElementById("displayPrize");
  //var elemPrizeText2 = document.getElementById("displayPrice");


  elemPrizeDiv.style.display = "block";

  
  //elemPrizeText2.innerHTML = '<h4 style="color:green"> Price of Prize : ' + priceOfPrize + ' Dollars';


}

function addToHistory() {
  var GuessedPriceParsed = parseFloat(
    document.getElementById("GuessedPrice").value
  );

  var historyOutput = GuessedPriceParsed;

  appendTable(historyOutput);
}

function appendTable(historyOutput) {
  var table = document.getElementById("resultCheck");
  var row = table.insertRow(0);
  var cell0 = row.insertCell(0);

  cell0.innerHTML = historyOutput;
}

function appendFinalTable() {

  // console.log("win : " + win);
  // console.log("numOfGuesses : " + numOfGuesses);
  // console.log("recordedTimeLeft : " + recordedTimeLeft);
  // console.log("prize : " + prize);
  // console.log("priceOfPrize : " + priceOfPrize);

  var table = document.getElementById("finalResults");
  var row = table.insertRow(0);
  var cell0 = row.insertCell(0);
  var cell1 = row.insertCell(1);
  var cell2 = row.insertCell(2);


  if (win == true) {
    win = "Won";
  } else {
    win = "Lost";
  }

  cell0.innerHTML = win;
  cell1.innerHTML = numOfGuesses;
  cell2.innerHTML = recordedTimeLeft;

}
