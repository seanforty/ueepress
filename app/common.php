<?php
declare(strict_types=1);

/*
 * 生成授权登录token，
 * @param string user
 * @param string pwd
 * @return string 返回md5加密的字符串
 */
function getToken(string $user="",string $pwd="")
{
    $salt = getSalt();
    $token = md5( $user . $pwd . $salt . time() );
    return $token;
}

/*
 * 生成随机字符串([a-zA-Z0-9])
 * @param len int
 * @return string
 */
function getSalt(int $len=10):string
{
    $resStr = "";
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $charsLen = strlen($chars);
    for($i=0;$i<$len;$i++){
        $randIndex = rand(0,$charsLen-1);
        $resStr .= $chars[$randIndex];
    }
    return $resStr;
}

/*
 * 组合密码明文和salt生成加密后的密码
 * @param pwd string
 * @param salt string
 * @return string
 */
function getPassword(string $pwd,string $salt):string
{
    return md5($pwd . $salt);
}

/*
 * 输出Json格式数据
 * @param result mix
 * @param HTTPStatusCode HTTP状态码
 * @return json
 */
function json(array $result,int $HTTPStatusCode=200):string
{
    return libs\Response::json($result,$HTTPStatusCode);
}

/*
 * 输出json格式的数据 { "status"=>true, "msg"=>"操作成功" }
 * @param status bool
 * @param msg string
 * @return string/json
 */
function status(bool $status,string $msg)
{
    $data = ["status"=>$status,"msg"=>$msg];
    return json($data);
}

/*
 * 验证数据库查询/执行结果，如为否则抛出异常
 * @param array/int res 数据库查询/执行结果
 * @param string msg 异常信息
 * @return void
 */
function DBException($res,string $msg)
{
    if(!$res) {
        throw new \app\api\exception\ParameterException($msg);
    }
}







