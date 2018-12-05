<?php
class stats{
	public function getAvgGuesses(){
		$user = 'root';
		$pass = '';
		$dbh = new PDO('mysql:host=localhost;dbname=prize', $user, $pass);
		$sql = "SELECT AVG(guesses_taken) as guesses_taken FROM game_history";
		
		$guess = $dbh->prepare($sql);
		$guess->execute();
		$myData = $guess->fetchALL(PDO::FETCH_ASSOC);
		foreach($myData as $data):
		echo $data['guesses_taken'];
		endforeach;
	}
	public function getFastestTime(){
		$user = 'root';
		$pass = '';
		$dbh = new PDO('mysql:host=localhost;dbname=prize', $user, $pass);
		$sql = "SELECT MIN(seconds_taken) as seconds_taken FROM game_history ";
		
		$time = $dbh->prepare($sql);
		$time->execute();
		$myData = $time->fetchALL(PDO::FETCH_ASSOC);
		foreach($myData as $data):
		echo $data['seconds_taken']." seconds";
		endforeach;
		
	}
	public function getWinLoss(){
		$user = 'root';
		$pass = '';
		$dbh = new PDO('mysql:host=localhost;dbname=prize', $user, $pass);
		$sql = "SELECT result,COUNT(*) AS count FROM game_history GROUP by result";
		
		$avg = $dbh->prepare($sql);
		$avg->execute();
		$myData = $avg->fetchALL(PDO::FETCH_ASSOC);
		foreach($myData as $data):
		echo $data['result']." = ".$data['count']."</br>";
		endforeach;
	}
}

?>