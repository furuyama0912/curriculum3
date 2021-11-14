<?php
// db_connect.phpの読み込み
require_once('connect-db.php');

// function.phpの読み込み
require_once('Function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// 提出ボタンが押された場合
if (!empty($_POST)) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])){
        echo '発売日が未入力です';
    } elseif (empty($_POST["stock"])) {
        echo '在庫数が選択されていません';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力したtitleとcontentを格納
        $title = $_POST['title'];
        $date = $_POST['date'];
        $stock = $_POST['stock'];
        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>本 登録画面</h1>
    <form method="POST" action="">
        <input type="text" name="title" id="title" placeholder="タイトル">
        <br>
        <input type="text" name="date" id="date" placeholder="発売日">
        <br>
        在庫数<br>
        <select name="stock" id="stock" >
            <option hidden>選択してください</option>
            <option value="">-</option>
            <?php
            for($i = 1; $i < 100; $i++){
            echo '<option value=' .$i. '>' .$i. '</option>';
            } ?>
        </select>
        <br>
        <input type="submit" value="登録" id="books" name="books">
    </form>
</body>
</html>