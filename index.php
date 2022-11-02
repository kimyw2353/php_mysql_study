<?php
	$conn = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
	
	$sql = "SELECT * FROM topic";
	$result = mysqli_query($conn, $sql);
    $list = '';
	while ($row = mysqli_fetch_array($result)) {
		$list = $list. "<li>{$row['title']}</li>";
	}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
<h1>WEB</h1>
<ol>
    <?=$list?>
</ol>
<a href="create.php">create</a>
<h2>Welcome</h2>
</body>
</html>