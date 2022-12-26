<?php
require_once("dbc.php");
$blogData = getAllBlog();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/blog_app/css/app.css">
	<title>ブログ一覧</title>
</head>
<body>
	<?php include("header.php"); ?>
	<div class="container">
		<h2>ブログ一覧</h2>
		<table>
			<tr>
				<th>No</th>
				<th>タイトル</th>
				<th>カテゴリ</th>
			</tr>
			<?php foreach($blogData as $blog) : ?>
			<tr>
				<td><?php echo $blog["id"]; ?></td>
				<td><?php echo $blog["title"]; ?></td>
				<td><?php echo setCategoryName($blog["category"]); ?></td>
				<td><a href="/blog_app/detail.php?id=<?php echo $blog["id"]; ?>">詳細</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>
