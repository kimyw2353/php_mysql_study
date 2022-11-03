<?php
	$conn = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
	
	$sql = "SELECT * FROM topic";
	$result = mysqli_query($conn, $sql);
	$list = '';
	while ($row = mysqli_fetch_array($result)) {
        $escaped_title = htmlspecialchars($row['title']);
		$list = $list . "<li><a
        href=\"index.php?id={$row['id']}\">{$escaped_title}
        </a></li>";
	}
 
	$article = array(
		'title' => 'Welcome',
		'description' => 'Hello Yael'
	);
    if (isset($_GET['id'])) {
    $filteredId = mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "SELECT * FROM topic WHERE id = {$filteredId}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
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
<a href="create.php">create</a>
<h2><?=$article['title']?></h2>
<?=$article['description']?>
</body>
</html>