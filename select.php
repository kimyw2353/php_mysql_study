<?php
	$conn = mysqli_connect(
		'localhost',
		'root',
		'root',
		'opentutorials');
	
	/* 1 row */
	echo '<h1>single row</h1>';
	$sql = "SELECT * FROM topic WHERE id = 11";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	echo '<h2>'.$row['title'].'</h2>';
	echo $row['description'];
	
	/* all row */
	echo '<h1>multi row</h1>';
	$sql = "SELECT * FROM topic";
	$result = mysqli_query($conn, $sql);
	
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
//
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
//	$row = mysqli_fetch_array($result);
//	echo '<h2>'.$row['title'].'</h2>';
//	echo $row['description'];
	// 더이상 출력할 데이터가 없을 때 null을 반환함. 로직이 바뀌거나 갯수가 바뀌었을 때 출력이 안되는 상황 발생
	echo '<hr>';
	
	/* all row (while) */
	echo '<h1>while row</h1>';
	while($row = mysqli_fetch_array($result)){
		echo '<h2>'.$row['title'].'</h2>';
		echo $row['description'];
		//null이 아니라면 참으로 판단해서 계속 실행. null이 나오면 반복문이 종료됨.
	}
	