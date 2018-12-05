<?php
//run if cookies are not null
if(isset($_COOKIE['name'])&&isset($_COOKIE['result'])&&isset($_COOKIE['prize'])&&isset($_COOKIE['prize_price'])&&isset($_COOKIE['guesses_taken'])&&isset($_COOKIE['time_taken'])){
	$user = 'root';
		$pass = '';
		$dbh = new PDO('mysql:host=localhost;dbname=prize', $user, $pass);
		$sql = 'INSERT INTO game_history (player_name,result, prize, prize_price,guesses_taken,seconds_taken,date_played) VALUES (:name,:res,:p,:pp,:guesses,:time,:date)';
		$history = $dbh->prepare($sql);
			$history->bindValue(':name',$_COOKIE['name']);
			$history->bindValue(':res',$_COOKIE['result']);
			$history->bindValue(':p',$_COOKIE['prize']);
			$history->bindValue(':pp',$_COOKIE['prize_price']);
			$history->bindValue(':guesses',$_COOKIE['guesses_taken']);
			$history->bindValue(':time',$_COOKIE['time_taken']);
			$date = date("y-m-d H:i:s");
			$history->bindValue(':date',$date);
			$history->execute();
			
}
			//set cookie vals to null
			setcookie('name','');
			setcookie('result','');
			setcookie('prize','');
			setcookie('price_prize','');
			setcookie('guesses_taken','');
			setcookie('time_taken','');