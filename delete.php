<?php
require_once("dbc.php");
$id = $_GET["id"];

try {
  $dbh = dbConnect();
  $sql = "DELETE FROM blogs WHERE id = :id";
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  $stmt->execute();
  header("Location: http://localhost/blog_app/index.php");
  exit();
} catch(PDOException $e) {
  echo $e->getMessage();
}

?>
