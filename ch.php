<?php
header("Content-Type:text/html; charset=utf-8");
$arr = array();
$booklist = array();
$replacement = array("：訪問網站　　(啟蒙書網)","“ubsp;","請記住本站域名:","<b>黃金屋</b>","<p>　　");
$replacementTo = array("","","","","<p>");
$str = $_GET["s"];
//----- 定義要擷取的網頁地址
$url = "https://t.hjwzw.com/Read/".$str;
//----- 讀取網頁源始碼
$fp = file_get_contents($url);

//----- 擷取資訊
/*
preg_match_all ('/<a href=\"\/Book\/Read\/35651\,(.*?)".*?>(.*)<\/a>/', $fp, $out);
*/
preg_match_all ('/<p>(.+?)<\/p>/', $fp, $out);
$resultCount = (string)count($out[1]);
for ($t = 0;$t <=count($out[1])-1; $t++){
echo str_replace($replacement,$replacementTo,$out[0][$t]);
}
?> 