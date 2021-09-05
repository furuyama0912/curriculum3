<?php
    $testFile = "test.txt";
    $contents = "自分で行った課題です！";
    
    if (is_writable($testFile)) {
        $fp = fopen($testFile, "w");
        fwrite($fp, $contents);
        fclose($fp);
        echo "書き込み完了！";
    } else {
        echo "書き込み出来ていません。";
        exit;
    }


    $test_file = "test2.txt";
    
    if (is_readable($test_file)) {
        $fp = fopen($test_file, "r");
        while ($line = fgets($fp)) {
            echo $line.'<br>';
        }
        fclose($fp);
    } else {
        echo "not readable!";
        exit;
    }