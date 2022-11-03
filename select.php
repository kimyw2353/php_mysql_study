<?php
	$conn = mysqli_connect(
		'localhost',
		'root',
		'root',
		'opentutorials');
	
	//$sql = "SELECT * FROM topic"; -- 전체 행 가져오기
	$sql = "SELECT * FROM topic WHERE id = 11"; //하나의 행만 가져오기
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	print_r($row);
	echo '<h1>'.$row['title'].'</h1>';
	echo $row['description'];