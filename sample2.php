<?php
/**
 * 輸出多張圖片 到一部影片
 * User: imagi
 * Date: 2017/6/28
 * Time: 上午 10:06
 */
//=================================設定======================================

//ffmpeg 的執行路徑
$ffmpeg = "/usr/bin/ffmpeg";


//影片總長度
$totalTime = '00:01:30';

// 將影片輸出為
$outputFile = './output/im-movie-sample2.mp4';


//預設插入圖片
//假設你有一組圖片 sample-00.jpg, sample-01.jpg, sample-02.jpg, sample-03.jpg ...... sample-15.jpg (最後一張)
/*
例如:
  "%1d": 0, 1, 2, 3 ......
  "%3d": 000, 001, 002, 003 ......
在 CMD/BAT 中，由於 % 已既有特殊用途，若要表示 % 則必須寫為 %%

例1: -i "foo-%3d.jpg"
將會依序讀取輸入 foo-000.jpg, foo-001.jpg, foo-002.jpg, foo-003.jpg ......

例2: -i "foo-*.jpg"
此代表檔名為 "foo-" 開頭的 JPG 檔，並依檔名排序讀取
 */
$insertImg = './assets/img/sample-%2d.jpg';


//=================================執行======================================

//執行輸出
$exec = "${ffmpeg} -loop 1 -r 1/10 -i ${insertImg} -r 30 -t ${totalTime} ${outputFile}";
exec("${exec} -y 2>&1", $result, $is_fail);


//=================================結果======================================
echo '<pre>';
print_r(compact('result','is_fail'));