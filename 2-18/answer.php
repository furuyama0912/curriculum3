<link rel="stylesheet" href="style1.css">
<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];
$ports = $_POST['ports'];
$language = $_POST['language'];
$command = $_POST['command'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
if($ports == $answer1){
	$result1 = "正解！";
}else{
	$result1 = "不正解･･･";
}

if($language == $answer2){
	$result2 = "正解！";
}else{
	$result2 = "不正解･･･";
}

if($command == $answer3){
	$result3 = "正解！";
}else{
	$result3 = "不正解･･･";
}
?>
<p><?php echo $my_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo $result1 ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo $result2 ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo $result3 ?>