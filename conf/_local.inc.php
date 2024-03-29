<?php
/**
 * @name _local.inc.php
 * @desc 配置文件
 * @author wangyi
 * @caution 路径和URL请不要加反斜线
 **/

/*---------------------------项目级别常量开始---------------------------------*/
//此项目的根目录URL
define('ROOT_DOMAIN','http://'.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '127.0.0.1'));
//此项目绝对地址
define('ROOT_PATH',substr(dirname(__FILE__),0, -4));
define('APP_PATH', ROOT_PATH . '/web');
/*--------下面的常量定义都可以被更小项目中前缀为SUB_的同名常量所覆盖-------*/
//此项目日记文件地址
define('LOG_PATH',ROOT_PATH . '/log');
//配置文件目录
define('AUTOLOAD_CONF_PATH',ROOT_PATH . '/conf');
//自定义类自动加载路径
define('CUSTOM_CLASS_PATH', ROOT_PATH . '/class');
//模版目录
define('TEMPLATE_PATH', ROOT_PATH . '/views');
/*--------常量覆盖结束-------*/
/*---------------------------项目级别常量开始---------------------------------*/
define('AUTH_COOKIE_NAME', 'miaosha_auth');

define('ENV_PREFIX','miaosha_env');

initEnv(ROOT_PATH,ENV_PREFIX);
//解释根目录下的.env
function initEnv($root_path,$env_prefix){
    
    if (is_file($root_path . '.env')) {
        $env = parse_ini_file($root_path . '.env', true);
        
        foreach ($env as $key => $val) {

            $name = $env_prefix . strtoupper($key);
            
            if (is_array($val)) {
                foreach ($val as $k => $v) {
                    $item = $name . '_' . strtoupper($k);
                    putenv("$item=$v");
                }
            } else {
                putenv("$name=$val");
                //加入这一句
                $_ENV[$name]=$val;
            }
        }
    } 
}
//自定义的获取环境变量函数
function MyGetEnv($key,$default='')
{
    return getenv(ENV_PREFIX.$key) ? getenv(ENV_PREFIX.$key) : $default;
}
