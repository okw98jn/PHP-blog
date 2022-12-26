<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/blog_app/css/new.css">
  <title>新規投稿</title>
</head>
<body>
  <?php include("header.php"); ?>
  <div class="container">
    <h2>投稿</h2>
      <form class="new_form" action="create.php" method="POST">
        <div class="item">
          <label class="label_left" for="title">タイトル</label>
          <input id="title" name="title" type="text" placeholder="タイトルを入力"><br>
        </div>
        <div class="item">
          <label class="label_left" for="content">内容</label>
          <textarea id="content" name="content" type="text" placeholder="内容を入力"></textarea><br>
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
        <input type="submit" value="送信">
      </form>
  </div>
</body>
</html>
