<!--
CONNER KELTY - TYLER JOHNSTON - VENANCIO DA SILVA
Dec 1st
CSC 390
Project 5
basicActions.php
-->





<?php



$basicActionsObjects = new basicActions();


	if(isset($_POST["tostatsPageBtn"])) {
			$basicActionsObjects->tostatsPage();
	}

  if(isset($_POST["toindexMainBtn"])) {
			$basicActionsObjects->toindexMain();
	}



class basicActions
{

	public function tostatsPage() {

       header("Location: statsPage.php");
	}


  public function toindexMain() {

 //THOR
     //header("Location: /~keltyco/project5/public");
 //XAMPP
     header("Location: /project5/indexMain.php");
  }

}


//if need to display alert before redirect
// echo "<script type='text/javascript'>;
// window.location='/~keltyco/project4/public/';
// </script>";
