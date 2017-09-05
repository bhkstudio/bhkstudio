<?php
header("Content-Type:text/html; charset=utf-8");
$arr = array();
$booklist = array();
$replacement = array("[{",":{","}]}]","【","】","？","！");
$replacementTo = array("{",":[{","}]}","","","","");
$str = $_GET["s"];
//----- 定義要擷取的網頁地址
$url = "https://tw.hjwzw.com/Book/Chapter/".$str;
//----- 讀取網頁源始碼
$fp = file_get_contents($url);

//----- 擷取資訊
/*
preg_match_all ('/<a href=\"\/Book\/Read\/35651\,(.*?)".*?>(.*)<\/a>/', $fp, $out);
*/
preg_match_all ('/<a href=\"\/Book\/Read\/'.$str.'\,(.*?)".*?>(.*)<\/a>/', $fp, $out);
$resultCount = (string)count($out[1]);
for ($t = 0;$t <=count($out[1])-1; $t++){
//echo 'ID: '. $out[1][$t] . ' TD: ' . $out[2][$t]."<br/>";
$booklist[] = array('ID'=>$out[1][$t],'TD'=>$out[2][$t]);
}
$arr[] = array('result'=>$resultCount,'booklist'=>$booklist);
echo str_replace($replacement,$replacementTo,json_encode($arr,JSON_UNESCAPED_UNICODE));
?> 