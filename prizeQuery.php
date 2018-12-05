<?php

		$user = 'root';
		$pass = '';
		$dbh = new PDO('mysql:host=localhost;dbname=prize', $user, $pass);
		
		$sql = 'SELECT *FROM prize WHERE prize_id = :id ';
		
		$id = rand(1,2);
		
		$prize = $dbh->prepare($sql);
		
		$prize->bindValue(':id', $id);
		
		$prize->execute();
		$myData = array();
		$myData = $prize->fetchALL(PDO::FETCH_ASSOC);
		
		foreach($myData as $data):
		endforeach;
		echo json_encode($myData);
