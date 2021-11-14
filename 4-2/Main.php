<?php
// db_connect.phpの読み込み
require_once('connect-db.php');
// セッション開始
session_start();
// セッションにuser_nameの値がなければlogin.phpにリダイレクト
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
}
$pdo = db_connect();
try {
    // SQL文の準備
    $sql = "SELECT * FROM books ORDER BY id desc";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在庫一覧画面</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <button type="button" onclick="location.href='create-post.php'" >新規登録</button>
    <button type="button" onclick="location.href='Logout.php'">ログアウト</button><br />
    <table>
    <tr>
        <td>タイトル</td>
        <td>発売日</td>
        <td>在庫数</td></td>
        <td></td>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><button onclick="location.href='delete-post.php?id=<?php echo $row['id']; ?>'" >削除</button></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>