<?php
// define("GOAL", 40);
// $total = 0;
// for ($i = 1; $i <= GOAL; $i++) {
//     $n = rand(1, 6);
//     $total += $n;
//     echo "{$i}回目={$n}";
//     echo "<br/>";
//     if ($total >= GOAL) {
//         echo "合計{$i}回でゴールしました";
//         echo "<br/>";
//         break;
//     }
// }


$total = 0;
$i = 1;
while ($total <= 40) {
    $n = rand(1, 6);
    $total += $n;
    echo "{$i}回目={$n}";
    echo "<br/>";
    $i++;
    if ($total >= 40) {
        echo "合計{$i}回でゴールしました";
        echo "<br/>";
        break;
    }
}





date_default_timezone_set('Asia/Tokyo');
$time = intval(date('H'));
if (4 <= $time && $time <= 11) {
    echo "今{$time}時台です";
    echo "<br/>";
    echo "おはようございます。";
} elseif (12 <= $time && $time <= 20) {
    echo "今{$time}時台です";
    echo "<br/>";
    echo "こんにちは";
} else { 
    echo "今{$time}時台です";
    echo "<br/>";
    echo "こんばんは";
}