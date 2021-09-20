<link rel="stylesheet" href="style1.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$ports = ["80","22","20","21"];
$language = ["PHP","Python","JAVA","HTML"];
$command = ["join","select","insert","update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$answer1 = $ports[0];
$answer2 = $language[3];
$answer3 = $command[1];
?>
<!--フォームの作成 通信はPOST通信で-->
<p>お疲れ様です<?php echo $my_name; ?>さん</p>
<form action="answer.php" method="POST">
<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($ports as $value1){ ?>
    <input type="radio" name="ports" value="<?php echo $value1; ?>" /> <?php echo $value1; ?>
<?php } ?>
<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($language as $value2){ ?>
    <input type="radio" name="language" value="<?php echo $value2; ?>" /> <?php echo $value2; ?>
<?php } ?>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php foreach($command as $value3){ ?>
    <input type="radio" name="command" value="<?php echo $value3; ?>" /> <?php echo $value3; ?>
<?php } ?>
<br/>
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<input type="hidden" name="my_name" value="<?php echo $my_name; ?>">
<input type="hidden" name="answer1" value="<?php echo $answer1 ?>">
<input type="hidden" name="answer2" value="<?php echo $answer2 ?>">
<input type="hidden" name="answer3" value="<?php echo $answer3 ?>">
<input type="submit" value="回答する">