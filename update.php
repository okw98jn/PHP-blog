<?php
require_once("dbc.php");

function blogUpdate($blog) {
	$sql = "UPDATE blogs SET
            title = :title, content = :content, category = :category, publish_status = :publish_status
          WHERE
            id = :id";
	$dbh = dbConnect();
	$dbh->beginTransaction();
	try {
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $blog["title"], PDO::PARAM_STR);
		$stmt->bindValue(":content", $blog["content"], PDO::PARAM_STR);
		$stmt->bindValue(":category", $blog["category"], PDO::PARAM_INT);
		$stmt->bindValue(":publish_status", $blog["publish_status"], PDO::PARAM_INT);
    $stmt->bindValue(":id", $blog["id"], PDO::PARAM_INT);
		$stmt->execute();
		$dbh->commit();
		header('Location: http://localhost/blog_app/index.php');
		exit();
	} catch(PDOException $e) {
		$dbh->rollBack();
		exit($e);
	}
}
?>
