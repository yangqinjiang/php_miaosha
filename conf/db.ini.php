<?php
 
$config['db']['master'] = array(
    'host' =>  MyGetEnv('DB_HOST','127.0.0.1:3306'),
    'user' => MyGetEnv('DB_USER','root'),
    'password' => MyGetEnv('DB_PW','123456'),
    'dbname' => MyGetEnv('DB_NAME','miaosha'),
);
// $config['db']['slave'] = array(
//     'host' => '127.0.0.1:3306',
//     'user' => 'root',
//     'password' => 'root',
//     'dbname' => 'miaosha',
// );
