<?php
header("Content-Type:text/html; charset=utf-8");
/*
echo '{"result":"2","booklist":[{"name":"測試書藉1","code":"9999","author":"Test01","status":"測試"},{"name":"測試書藉2","code":"9998","author":"Test02","status":"測試"}]}';
*/
$arr = array();
$booklist = array();
$replacement = array("[{",":{","}]}]");
$replacementTo = array("{",":[{","}]}");
$replacementAS = array("<span>","<");
$str = $_GET["s"];
$name = mb_convert_encoding($str,"gbk","utf-8");
//----- 定義要擷取的網頁地址
$url = "https://t.hjwzw.com/List/".$name;
//----- 讀取網頁源始碼
$fp = file_get_contents($url);

//----- 擷取資訊
preg_match_all ('/<a href=\"\/Book\/(.*?)" title=\"(.*?)".*?>/is', $fp, $out);
preg_match_all ('/<span>*(.*?)</is', $fp, $ASresult);
for ($t = 0;$t <=1; $t++){
//echo 'LL: '. $att[0][$t]."<br/>";
//echo 'LL: '. $att[0][0]."<br/>";
//echo 'LL: '. $att[2][$t]."<br/>";
//echo 'LL: '. $att[3][$t]."<br/>";
}
//----- 印出結果
$resultCount = (string)count($out[1]);
for ($i = 1;$i <=count($out[1]); $i++){
$author = str_replace($replacementAS,"",$ASresult[0][($i-1)*2]);
$status = str_replace($replacementAS,"",$ASresult[0][$i*2-1]);
$booklist[] = array('name'=>$out[2][$i-1],'code'=>$out[1][$i-1],'author'=>$author,'status'=>$status);
//echo 'Link: '. $out[1][$i-1];
//echo 'Title: '. $out[2][$i-1];
//echo "<br/>";
}
$arr[] = array('result'=>$resultCount,'booklist'=>$booklist);
echo str_replace($replacement,$replacementTo,json_encode($arr,JSON_UNESCAPED_UNICODE));
//----- 擷取資訊
preg_match_all ('/<div class=\"ceent_2aimg\">.*?<span>(.*?).*?>/is', $fp, $atta);
preg_match_all ('/<a href=\"\/Book\/(.*?)" title=\"(.*?)".*?>/is', $fpa, $outa);
?> 