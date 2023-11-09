<?php
/*
翡翠台_1080P,https://php9.vercel.app/tvb.php?id=0
J2_1080P,https://php9.vercel.app/tvb.php?id=1
無線新聞台1080P,https://php9.vercel.app/tvb.php?id=2
無線新聞台576P,https://php9.vercel.app/tvb.php?id=3
無線新聞台1080P,https://php9.vercel.app/tvb.php?id=4
無線新聞台360P,https://php9.vercel.app/tvb.php?id=5
無線財經體育資訊台1080P,https://php9.vercel.app/tvb.php?id=6
無線財經體育資訊台360P,https://php9.vercel.app/tvb.php?id=7
事件直播頻道1,https://php9.vercel.app/tvb.php?id=8
事件直播頻道1_360P,https://php9.vercel.app/tvb.php?id=9
事件直播頻道2,https://php9.vercel.app/tvb.php?id=10
事件直播頻道2_360P,https://php9.vercel.app/tvb.php?id=11
*/
/*
    GeJI 
    .php?id=0 翡翠台
    .php?id=1 J2
    .php?id=2 無線新聞台
    .php?id=3 無線新聞台576P
    .php?id=4 無線新聞台·海外版
    .php?id=5 無線新聞台·海外版360P
    .php?id=6 無線財經體育資訊台·海外版
    .php?id=7 無線財經體育資訊台·海外版360P
    .php?id=8 事件直播頻道1
    .php?id=9 事件直播頻道1 360P
    .php?id=10 事件直播頻道2
    .php?id=11 事件直播頻道2 360P
*/
$id = $_GET['id'];
$ids = ['I-J','I-J2','C','C','I-NEWS','I-NEWS','I-FINA','I-FINA','NEVT1','NEVT1','NEVT2','NEVT2'];
if(!isset($ids[$id])) {
    exit();
};
$header[] = 'CLIENT-IP:127.0.0.1';
$header[] = 'X-FORWARDED-FOR:127.0.0.1';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://inews-api.tvb.com/news/checkout/live/hd/ott_'.$ids[$id].'_h264?profile=safari');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
$url = $json->content->url;
if($id == '3' || $id == '5' ||$id == '7' || $id == '9' || $id == '11' || $id == '13') {
    header('location:'.$url->sd);
} else {
    if($id == '2' || $id == '4' || $id == '6' || $id == '8' || $id == '10') {
        $r = preg_replace('/&p=(.*?)$/','',$url->hd);
        header('location:'.$r);
        exit();
    };
    header('location:'.$url->hd);
};
/*
翡翠台_1080P,https://tony.x10.mx/tvbtv.php?id=0
J2_1080P,https://tony.x10.mx/tvbtv.php?id=1
無線新聞台1080P,https://tony.x10.mx/tvbtv.php?id=2
無線新聞台576P,https://jun.x10.mx/tvbtv.php?id=3
無線新聞台1080P,https://jun.x10.mx/tvbtv.php?id=4
無線新聞台360P,https://jun.x10.mx/tvbtv.php?id=5
無線財經體育資訊台1080P,https://tv.x10.mx/tvbtv.php?id=6
無線財經體育資訊台360P,https://tv.x10.mx/tvbtv.php?id=7
事件直播頻道1,https://tv.x10.mx/tvbtv.php?id=8
事件直播頻道1_360P,https://tony.x10.mx/tvbtv.php?id=9
事件直播頻道2,https://tony.x10.mx/tvbtv.php?id=10
事件直播頻道2_360P,https://tony.x10.mx/tvbtv.php?id=11
*/
?>