<?php
/**
 * FILE_NAME: upload.php
 */

if(empty($_FILES['image'])){
    die(msg(400,'The image can not be null!'));
}else{
    $file = $_FILES['image'];
}
$imageInfo =getImageInfo($file['tmp_name']);
if(!$imageInfo)
    die(msg(400,'The image is illegal!'));
$newFileName = $file['tmp_name'].'.'.$imageInfo['type'];
rename($file['tmp_name'],$newFileName);
$body["file"] = new \CURLFile(realpath($newFileName));
//print_r($body);
$response = HidoveCurlPost('https://telegra.ph/upload',$body);
$response = json_decode($response,true);
//echo($response[0]['src']);
$imagesUrl['url'][0] = "https://i".rand(0,3).".wp.com/telegra.ph".$response[0]['src'];
$imagesUrl['url'][1] = "https://telegra.ph".$response[0]['src'];
$imagesUrl['url'][2] = "https://images.weserv.nl/?url=".$imagesUrl['url'][1];
//print_r($$imagesUrl['url'][0]imagesUrl);
die(msg(200,'success',$imagesUrl));
function HidoveCurlPost($url,$post){
    // 创建一个新 cURL 资源
    $curl = curl_init();
    // 设置URL和相应的选项
    // 需要获取的 URL 地址
    curl_setopt($curl, CURLOPT_URL,$url);
    #启用时会将头文件的信息作为数据流输出。
    curl_setopt($curl, CURLOPT_HEADER, false);
    #在尝试连接时等待的秒数。设置为 0，则无限等待。
    // curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    #允许 cURL 函数执行的最长秒数。
    // curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    #设置请求信息
    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
    #关闭ssl
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    #TRUE 将 curl_exec获取的信息以字符串返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // 抓取 URL 并把它传递给浏览器
    $return = curl_exec($curl);
    if ($return===false) {
        return "CURL Error:".curl_error($curl);
    }
    curl_close($curl);
    return $return;
}
function getImageInfo($fileName){
    $data = getimagesize($fileName);
    switch ($data[2]){
        case 1:return [
            'type'=>'gif',
            'mime'=> $data['mime']
        ];
        case 2:return [
            'type'=>'jpg',
            'mime'=> $data['mime']
        ];
        case 3:
            return [
                'type'=>'png',
                'mime'=> $data['mime']
            ];
        case 6:
            return [
                'type'=>'bmp',
                'mime'=> $data['mime']
            ];
        case 17:
            return [
                'type'=>'ico',
                'mime'=> $data['mime']
            ];
        default:
            return false;
    }
}
function msg($code,$msg,$data=[]){
    return json_encode([
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
    ]);
}
