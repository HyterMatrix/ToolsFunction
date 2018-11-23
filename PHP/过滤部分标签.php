<?php
function delTags($str)
{
  $farr = array(
  "/<(\/?)(script|i?frame|style|html|body|title|link|meta|form|input|embed|object|textarea|\?|\%)([^>]*?)>/isU",
  "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU"
  );
  $tarr = array(
  "",
  ""
  );
  $str = preg_replace( $farr,$tarr,$str);
  return $str;
}
$str = "<a href='#'>asdfasdfsd</a>====<script>alert(1111)</script>";
echo delTags($str);  //结果：<a href='#'>asdfasdfsd</a>====alert(1111)
echo strip_tags($str); //结果：sdfasdfsd====alert(1111)