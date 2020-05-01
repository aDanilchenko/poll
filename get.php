<?php

	$name = trim(strip_tags($_POST[name]));
	$email = $_POST[email];
	$answer_1 = $_POST[answer_1];
	$answer_2 = $_POST[answer_2];
	$answer_3 = $_POST[answer_3];

    $dsn = 'mysql:host=localhost;dbname=polls';
    $pdo = new PDO ($dsn, 'root', '');

    $sql = 'INSERT INTO users(name, email) VALUES(:name, :email)';
    $query = $pdo->prepare($sql);
    $query->execute(['name' => $name, 'email' => $email]);
	$id = $pdo->lastInsertId();

	$sql = 'INSERT INTO poll(user_answer, user_id) VALUES(:answer_1, :user_id)';
    $query = $pdo->prepare($sql);
    $query->execute(['answer_1' => $answer_1, 'user_id'=> $id]);
	
	$sql = 'INSERT INTO poll(user_answer, user_id) VALUES(:answer_2, :user_id)';
    $query = $pdo->prepare($sql);
    $query->execute(['answer_2' => $answer_2, 'user_id'=> $id]);
	
	$sql = 'INSERT INTO poll(user_answer, user_id) VALUES(:answer_3, :user_id)';
    $query = $pdo->prepare($sql);
    $query->execute(['answer_3' => $answer_3, 'user_id'=> $id]);
	

	
	