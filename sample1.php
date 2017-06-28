<?php
/**
 * 輸出1張圖片 到一部影片
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
$outputFile = './output/im-movie-sample1.mp4';

//預設插入圖片
//如果只有一張輸入圖片，則必須使用 -loop 1 重複讀取輸入
$insertImg = './assets/img/sample-01.jpg';


//=================================結果======================================

//執行輸出
$exec = "${ffmpeg} -loop 1 -i ${insertImg} -r 30 -t ${totalTime} ${outputFile}";
exec("${exec} -y 2>&1", $result, $is_fail);


//=================================結果======================================
echo '<pre>';
print_r(compact('result','is_fail'));