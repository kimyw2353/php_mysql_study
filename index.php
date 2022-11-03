<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while ($row = mysqli_fetch_array($result)) {
	$escaped_title = htmlspecialchars($row['title']);
	$list = $list."<li><a
        href=\"index.php?id={$row['id']}\">{$escaped_title}
        </a></li>";
}

$article = array(
	'title' => 'Welcome',
	'description' => 'Hello Yael'
);
$update_link = '';
$delete_link = '';
if (isset($_GET['id'])) {
	$filteredId = mysqli_real_escape_string($conn, $_GET['id']);
	$sql = "SELECT * FROM topic WHERE id = {$filteredId}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = htmlspecialchars($row['title']);
	$article['description'] = htmlspecialchars($row['description']);
	$update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
	$delete_link = '
	    <form action = "process_delete.php" method = "post">
	        <input type="hidden" name="id" value="'.$_GET['id'].'">
	        <input type="submit" value="delete">
		</form>';
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
			<?=$list?>
		</ol>
		<a href="create.php">create</a>
		<?=$update_link?>
		<?=$delete_link?>
		<h2><?=$article['title']?></h2>
		<?=$article['description']?>
	</body>
</html>