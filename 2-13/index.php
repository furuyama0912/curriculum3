<?php
$x = 1.5;
    echo ceil($x);
    echo "<br/>";

    echo floor($x);
    echo "<br/>";

    echo pi();
    echo "<br/>";    
function circleArea($r) {
    $circle_area = $r * $r * pi();
    echo $circle_area; 
}
circleArea(3);
echo "<br/>";

echo mt_rand(1, 100);
echo "<br/>";

$str = "PHP";
    echo strlen($str);
    echo "<br/>";

$str = "furuyama";
    echo strpos($str, "u");
    echo "<br/>";

$str = "furuyama";
    echo substr($str, 4, 4);
    echo "<br/>";

$str = "furuyama";
    echo str_replace("yama", "YAMA", $str);
    echo "<br/>";

$str = "My name is furuyama";
    echo str_replace(" ", "", $str);
    echo "<br/>";

$str = "ふるやま";
    echo strlen($str);
    echo "<br/>";


$commuting_time_hour = 5;
$commuting_time_minute = 30;
    printf("今日の出勤時間は%02d時%02dです",$commuting_time_hour,$commuting_time_minute);
    echo "<br/>";
    $commuting_time = sprintf("今日の出勤時間は%02d時%02dです",$commuting_time_hour,$commuting_time_minute);
    echo $commuting_time;

