<?php
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
?>
