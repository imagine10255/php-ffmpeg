<?php
/**
 * 將各別圖片製作成各別的影片 (為了
 * 在進行影片合併, 並且在合併時加入音樂
 * User: imagi
 * Date: 2017/6/28
 * Time: 上午 10:06
 */
//=================================設定======================================

//ffmpeg 的執行路徑
$ffmpeg = "/usr/bin/ffmpeg";

//設定影片長度,圖片路徑
$tsVideo = array(
    ['totalTime'=>'00:00:03','insertImg'=>'./assets/img/sample-01.jpg','outputFile'=>'./output/im-movie-sample4-01.ts'],
    ['totalTime'=>'00:00:05','insertImg'=>'./assets/img/sample-02.jpg','outputFile'=>'./output/im-movie-sample4-02.ts'],
);
foreach($tsVideo as $video){
    //執行輸出
    $exec = "${ffmpeg} -loop 1 -i ${video['insertImg']} -r 30 -t ${video['totalTime']} -vbsf h264_mp4toannexb ${video['outputFile']}";
    exec("${exec} -y 2>&1", $result, $is_fail);

    //印出結果
    echo '<pre>';
    print_r(compact('result','is_fail'));
}




//合併影片
$insertAudio = './assets/audio/sample-01.mp3';
$outputFile = './output/im-movie-sample4.mp4';

$exec = 'ffmpeg  -i '.$insertAudio.' -strict -2 -i concat:"./output/im-movie-sample4-02.ts|./output/im-movie-sample4-01.ts" -c copy '.$outputFile;
exec("${exec} -y 2>&1", $result, $is_fail);

//=================================結果======================================
echo '<pre>';
print_r(compact('result','is_fail'));

