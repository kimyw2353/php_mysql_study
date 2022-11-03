력<?php
	$conn = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
	
	$sql = "SELECT * FROM topic";
	$result = mysqli_query($conn, $sql);
	$list = '';
	while ($row = mysqli_fetch_array($result)) {
		$list = $list . "<li><a
        href=\"index.php?id={$row['id']}\">{$row['title']}
        </a></li>";
	}
	
	$article = array(
		'title' => 'Welcome',
		'description' => 'Hello Yael'
	);
	if (isset($_GET['id'])) {
		$sql = "SELECT * FROM topic WHERE id = {$_GET['id']}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$article['title'] = $row['title'];
		$article['description'] = $row['description'];
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
<h1><a href="index.php">WEB</a></h1>
<ol>
	<?= $list ?>
</ol>
<form action="process_create.php" method="post">
	<p><input type="text" name="title" placeholder="title"></p>
	<p><textarea name="description" placeholder="description"></textarea></p>
    <p><input type="submit"></p>
</form>
</body>
</html>