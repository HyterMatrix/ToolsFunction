<?php
//两种方法

/**
 * XML数据解码
 * @param  string $xml 原始XML字符串
 * @return array 解码后的数组
 * @throws \Exception
 */
protected static function xml2data($xml){
	$xml = new \SimpleXMLElement($xml);

	if(!$xml){
		throw new \Exception('非法XXML');
	}

	$data = array();
	foreach ($xml as $key => $value) {
		$data[$key] = strval($value);
	}

	return $data;
}

//第二种方法
$array = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);