<?php

//打印测试数据函数
function p($s)
{

    echo '<pre>';
    var_dump($s);
    echo '</pre>';
}

// 获取最后一条sql
function lastSql()
{
    \DB::connection()->enableQueryLog(); // 开启查询日志
    // DB::enableQueryLog();
    // dd(DB::enableQueryLog());
    $sql = DB::getQueryLog();
    // $queries = DB::getQueryLog();
    // dd($queries);
    $query = end($sql);

    return $query;
}
// 获取最后一条sql
function getLastSql()
{
    DB::listen(function ($sql) {
        foreach ($sql->bindings as $i => $binding) {
            if ($binding instanceof \DateTime) {
                $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            } else {
                if (is_string($binding)) {
                    $sql->bindings[$i] = "'$binding'";
                }
            }
        }
        $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
        $query = vsprintf($query, $sql->bindings);
        print_r($query);
        echo '<br />';
    });
}

//二维数组去掉重复值
function a_array_unique($array)
{
    $out = array();

    foreach ($array as $key => $value) {
        if (!in_array($value, $out)) {
            $out[$key] = $value;
        }
    }

    $out = array_values($out);
    return $out;
}

/**
 * 获得信息编号
 */
function getInfoCode($type = 'info')
{
    // 信息编号为Unix时间戳后9位
    $code = 'I-';
    $date = (string) (time());
    $date = substr($date, 1);
    $code .= $date;
    return $code;
}

/**
 * Json对象转数组
 */
function jsonToArray($json = '')
{
    return json_decode($json, true);
}

/**
 * 获得随机字符串
 * @param $len             需要的长度
 * @param $special        是否需要特殊符号
 * @return string       返回随机字符串
 */
function getRandomStr($len, $special = false)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9",
    );

    if ($special) {
        $chars = array_merge($chars, array(
            "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
            "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
            "}", "<", ">", "~", "+", "=", ",", ".",
        ));
    }

    $charsLen = count($chars) - 1;
    shuffle($chars); //打乱数组顺序
    $str = '';
    for ($i = 0; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $charsLen)]; //随机取出一位
    }
    return $str;
}
