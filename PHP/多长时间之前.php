<?php

function timeFromNow($dateline) {
  if(empty($dateline)) return false;
  $seconds = time() - $dateline;
  if ($seconds < 60){
    return "1分钟前";
  }elseif($seconds < 3600){
    return floor($seconds/60)."分钟前";
  }elseif($seconds < 24*3600){
    return floor($seconds/3600)."小时前";
  }elseif($seconds < 48*3600){
    return date("昨天 H:i", $dateline)."";
  }else{
    return date('Y-m-d', $dateline);
  }
}
echo timeFromNow(strtotime("2017-04-24 14:15:13")); //昨天 14:15
echo timeFromNow(strtotime("2017-04-25 13:10:13")); //1小前

?>