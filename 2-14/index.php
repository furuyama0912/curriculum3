<?php
$fruits = ["orange","grape","apple"];
    echo count($fruits);
    echo "<br/>";

    sort($fruits);
    var_dump($fruits);
    echo "<br/>";

    if(in_array("a", $fruits)){
        echo "リンゴはあります！";
    }
    else{
        echo "リンゴはありません！";
    }
    echo "<br/>";

    $atstr = implode("@", $fruits);
    var_dump($atstr);
    echo "<br/>";

    $re_members = explode("@", $atstr);
    var_dump($re_members);

