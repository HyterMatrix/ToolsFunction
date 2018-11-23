<?php

//查看哈希值的相关信息
array password_get_info (string $hash)
//创建hash密码
string password_hash(string $password , integer $algo [, array $options ])
//判断hash密码是否特定选项、算法所创建
boolean password_needs_rehash (string $hash , integer $algo [, array $options ] 
boolean password_verify (string $password , string $hash)
//验证密码
$password = 'password123456';//原始密码
$hash_password = password_hash($password, PASSWORD_BCRYPT);//使用BCRYPT算法加密密码
if (password_verify($password , $hash_password)){
   echo "密码匹配";
}else{  
   echo "密码错误";
}