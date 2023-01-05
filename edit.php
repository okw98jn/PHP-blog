<?php 
require_once("dbc.php");
require_once("update.php");
$blog = $_POST;
$id = $_GET["id"];
$result = getBlog($id);
$error_messages = [];

if(!empty($blog["submit"])) {
	if (empty($blog['title'])) {
		$error_messages[] = "タイトルを入力してください";
	}
  if (empty($blog["content"])) {
    $error_messages[] = "投稿内容を入力してください";
  }
  if (empty($blog["category"])) {
    $error_messages[] = "カテゴリーを選択してください";
  }
  if (empty($error_messages)) {
    blogUpdate($blog);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/blog_app/css/new.css">
  <title>編集</title>
</head>
<body>
<?php include("header.php"); ?>
  <div class="container">
    <h2>編集</h2>
      <form class="new_form" action="edit.php" method="POST">
        <?php if( !empty($error_messages) ): ?>
          <ul class="error_messages">
            <?php foreach( $error_messages as $error_message ): ?>
              <li><?php echo $error_message; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="item">
          <label class="label_left" for="title">タイトル</label>
          <input id="title" name="title" type="text" placeholder="タイトルを入力" value="<?php echo $result["title"];?>"><br>
        </div>
        <div class="item">
          <label class="label_left" for="content">内容</label>
          <textarea id="content" name="content" type="text" placeholder="内容を入力"><?php echo $result["content"];?></textarea><br>
        </div>
        <div class="item">
          <label class="label_left" for="category">カテゴリー</label>
          <select name="category" id="category">
            <option value="">以下から選択してください</option>
            <option value="1">ブログ</option>
            <option value="2">日常</option>
            <option value="3">その他</option>
          </select><br>
        </div>
        <div class="item">
          <fieldset>
            <legend>公開設定</legend>
            <label for="公開">公開</label>
            <input id="release" type="radio" name="publish_status" value="1" checked>
            <label for="非公開">非公開</label>
            <input id="private" type="radio" name="publish_status" value="2">
          </fieldset>
        </div>
        <input type="submit" value="送信" name="submit">
      </form>
  </div>
</body>
</html>
