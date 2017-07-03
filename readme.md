## PHP FFmpeg Test Sample

- sample1.php 單一圖片輸出mp4
- sample2.php 多圖片輸出mp4
- sample3.php 多圖片+音樂輸出mp4
- sample4.php 多圖片(各別圖片停留時間)+音樂輸出mp4

## CentOS Install FFmpeg 

    STEP1.安裝 GPG key 

    $ rpm --import http://packages.atrpms.net/RPM-GPG-KEY.atrpms

    STEP2.安裝 ATRPMS Repo:

    $ rpm -ivh http://dl.atrpms.net/all/atrpms-repo-6-7.el6.x86_64.rpm

    STEP3.安裝 FFMpeg 

    $ yum -y --enablerepo=atrpms install ffmpeg ffmpeg-devel

    STEP4.測試是否安裝成功
    
    $ ffmpeg -version