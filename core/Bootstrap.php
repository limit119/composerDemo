<?php
namespace core;
class Bootstrap {
    public static function run(){
        session_start();
        self::parseUrl();
    }

    /*
    * 分析url生成控制器方法常量
    * ly
    * 2020/02/13
    */
    public static function parseUrl (){
        if(isset($_GET['s'])) {
            $info = explode('/',$_GET['s']);
            $class = "\web\controller\\".ucfirst($info[0]);//ucfirst 将首字母转换成大写
            $action = $info[1];
        } else{
            $class = "\web\controller\Index";
            $action = "show";
        }
        echo (new $class)->$action();
    }



    /*
     * 发送弹幕
     * ly
     * 2020/02/13
     */
    public static function sendComment(){
        ini_set('max_execution_time',3600*24);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, '');
        curl_setopt($curl, CURLOPT_COOKIE,'');
        for($i = 0;$i < 100000;$i++){
            $result = curl_exec($curl);
        }
        curl_close($curl);
        dd($result);
    }
}