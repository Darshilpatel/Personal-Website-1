<? php 
require_once 'app/init.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
");
$itemsQuery->execute([
	'user' => $_SESSION['user_id']
	]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
foreach ($items as $item) {
echo $item['name'], '<br>';
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Darshil Patel</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="list">
		<h1 class="header">To do.</h1>

		<ul class="items">
			<li>
				<span class="item">Pick Up Shopping</span>
				<a href="#" class="done-button">Mark as done</a>
			</li>
		</ul>

		<form class="item-add" action="add.php" method="post">
			<input type="text" name="name" placeholder="Add a New Item" class="input" autocomplete="off" required>
			<input type="submit" value="Add" class="submit">
		</form>
	</div>


</body>
</html>