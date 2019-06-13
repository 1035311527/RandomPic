<?php
//4K：36 美女模特：6 爱情：30 风景：9 小清新：15 动漫：26 明星：11 萌宠：14 汽车：12 时尚：10 月历壁纸：29 影视：7 小孩：18 军事：22 体育：16 文字：35
if(isset($_GET["cid"]))         //判断是否含有get参数，如果没有给出默认值
        {
            $cid=$_GET["cid"];
        } else {
            $cid="26";
        }
if(isset($_GET["start"]))
        {
            $start=$_GET["start"];
        } else {
            $start=rand(0,10);
        }
if(isset($_GET["count"]))
        {
            $count=$_GET["count"];
        } else {
            $count="30";
        }
if(isset($_GET["size"]))
        {
            $size=$_GET["size"];
        } else {
            $size="0";
        }
$random=rand(0,$count);
$url = file_get_contents('http://wallpaper.apc.360.cn/index.php?%20c=WallPaper&a=getAppsByCategory&cid='.$cid.'&start='.$start.'&count='.$count.'&from=360chrome');
$arr = json_decode($url, true);
//循环列表并提取img
switch ($size) {            //循环size获取返回不同大小图片链接
    case '1':
        $img=$arr["data"][$random][img_1600_900];
        break;
    case '2':
        $img=$arr["data"][$random][img_1440_900];
        break;
    case '3':
        $img=$arr["data"][$random][img_1366_768];
        break;
    case '4':
        $img=$arr["data"][$random][img_1280_800];
        break;
    case '5':
        $img=$arr["data"][$random][img_1280_1024];
        break;
    case '6':
        $img=$arr["data"][$random][img_1024_768];
        break;
    default:
        $img=$arr["data"][$random][url];
        break;
}

header("location:$img");        //返回对应图片链接