<?php
/**
  * 获取Bing每日壁纸和故事
  * @author giuem
  */
function bingImgFetch(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $re = curl_exec($ch);
    curl_close($ch);
    $re = json_decode($re,1);//电脑版返回内容
    $re2 = json_decode(file_get_contents('http://cn.bing.com/cnhp/coverstory/'),1);//移动版返回内容
    return array(
    	/* 更改图片尺寸，减小体积 */
        // 'url' => str_replace('1920x1080','1366x768',$re['images'][0]['url']),
        'url' => $re['images'][0]['url'],
        /* 结束日期 */
        'date' => date('j',strtotime($re['images'][0]['enddate'])),
        /* 故事标题 */
        'title' => $re2['title'],
        /* 内容 */
        'd' => $re2['para1']
    );
}

$array=(bingImgFetch());

// $a1=json_encode($array);

// $a2=json_decode($a1);
// var_dump($a2);

// print_r($array);

$url=$array['url'];
$title=$array['title'];
$date=date('Y-m').'-'.$array['date'];
$d=$array['d'];


?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>
<style type="text/css">
    body {

        background-color: lavender;
    }
</style>
<head>
    <title>Index</title>
</head>
<body>
    <a href="<?php echo $url;?>" alt="" target="_blank"><img src="<?php echo $url;?>" alt=""></a>
    <p><?php echo $title;?></p>
    <p><?php echo $d;?></p>
    <p><?php echo $date;?></p>
    <?php phpinfo();?>
</body>
</html>