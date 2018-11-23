<?php
/**
 * Created by myTools.
 * User: Hyter(Charles.ming.wang)
 * Email: admin@hyter.me
 * Date: 2017/7/3 上午12:53
 */

function key(){
    //商户证书生成
    $openssl_res = openssl_pkey_new(array(
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));
    openssl_pkey_export($openssl_res, $private_key);
    $pubKey = openssl_pkey_get_details($openssl_res);
    unset($openssl_res);
    return ['public_key'=>$pubKey['key'],'private_key'=>$private_key];

}