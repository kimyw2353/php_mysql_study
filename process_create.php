<?php
	$conn = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
	$sql = "
		INSERT INTO topic
		(title, description, created)
		VALUES(
		       '{$_POST['title']}',
		       '{$_POST['description']}',
		       NOW()
		)
	";
	$result = mysqli_query($conn, $sql);
	if($result === false) {
		echo '저장하는 중 문제가 생겼슴니다. 관리자에게 문의해주세요.';
		error_log(mysqli_error($conn));
	} else {
		echo '저장되었습니다. <a href = "index.php">돌아가기</a>';
	}