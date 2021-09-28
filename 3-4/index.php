<link rel="stylesheet" href="style.css">

<?php
require_once("pdo.php");
require_once("getData.php");

connect();


$getuser = new getData();
$i=$getuser -> getUserData();
?>

<header>
    <div class="logo"><img src="1599315827_logo.png"></div>
    <div class="name">
        <p>ようこそ <?php echo $i['last_name'].$i['first_name']?> さん</p></div>
    <div class="login">
        <p>最終ログイン日：<?php echo $i['last_login']; ?></p></div>
</header>




<main>
    <table>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
        <?php
        $getpost = new getData();
        $a= $getpost -> getPostData(); 
        foreach($a as $key => $val){
        ?>
        <tr>
            <td><?php echo  $val['id']?></td>
            <td><?php echo  $val['title']?></td>
            <td><?php echo  $val['category_no']?></td>
            <td><?php echo  $val['comment']?></td>
            <td><?php echo  $val['created']?></td>
        </tr>
        <?php } ?>
    </table>
</main>

<footer>
    <p>Y&I group.inc</p>
</footer>











