<?php

// db_connect.phpの読み込みFILL_IN
require_once('connect-db.php');
// POSTで送られていれば処理実行
if (isset($_POST["signUp"])) {
$name = $_POST['name'];
$password = $_POST['password'];
// nameとpassword両方送られてきたら処理実行
// PDOのインスタンスを取得FILL_IN
$pdo =db_connect();
try {
// SQL文の準備 FILL_IN 
$sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
// パスワードをハッシュ化
$password_hash = password_hash($password, PASSWORD_DEFAULT);
// $stmt->bindValue(':password', $password_hash);
// プリペアドステートメントの作成 FILL_IN 
// 値をセット　FILL_IN
// 実行 FILL_IN
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':password', $password_hash);
$stmt->execute();
echo '登録完了';
//　登録完了メッセージ出力
}catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
    die();
// エラーメッセージの出力 FILL_IN 
// 終了 FILL_IN
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>ユーザー登録画面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>ユーザー登録画面</h1>
    <form method="POST" action="">
        <input type="text" name="name" id="name">
        <br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
</body>
</html>