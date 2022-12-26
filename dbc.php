<?php
function dbConnect() {
	$dsn = "mysql:host=localhost;dbname=blog_app;charset=utf8";
	$user = "blog_user";
	$pass = "password";

	try {
		$dbh = new PDO($dsn, $user, $pass, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		]);
	} catch(PDOException $e) {
		echo "接続失敗". $e->getMessage();
		exit();
	};
	return $dbh;
}

function getAllBlog() {
	$dbh = dbConnect();
	$sql = "select * from blogs";
	$stmt = $dbh->query($sql);
	$result = $stmt->fetchall(PDO::FETCH_ASSOC);
	return $result;
	$dbh = null;
}

function setCategoryName($categoryId) {
	if ($categoryId === "1") {
		return "ブログ";
	} elseif ($categoryId === "2") {
		return "日常";
	} else {
		return "その他";
	}
}

function getBlog($id) {
	if (empty($id)) {
		exit("IDが不正です");
	}
	$dbh = dbConnect();
	$stmt = $dbh->prepare("select * from blogs where id = :id");
	$stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if (!$result) {
		exit("ブログがありません");
	}

	return $result;
}
?>


