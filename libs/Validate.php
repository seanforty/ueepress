<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/5
 * Time: 7:24
 */
declare (strict_types=1);
namespace libs;

use libs\Config;

class Validate
{
    protected $rules=[]; //array
    protected $message = [];

    /*
     * 构造函数，传入验证规则和提示信息，默认为空
     * @param array rules
     * @param array message
     * @return void
     */
    public function __construct(array $rules=[], array $message=[])
    {
        if($rules)
        {
            $this->rules = $rules;
        }
        if($message)
        {
            $this->message = $message;
        }
    }

    /*
     * 传递验证规则rules
     * @param rule array
     * 格式: [
     *          "pwd"=>[
     *              ["isRequired","isPositiveInt","numWithin:3,5"],
     *              ["不能为空","非正整数","不在范围"]
     *          ]
     *      ]
     * @return void
     */
    public function rule(array $rules=[])
    {
        $this->rules = $rules;
    }

    /*
     * 验证主方法，通过返回true，未通过返回异常信息
     * @param data array    格式: [ "user"=>"sean", "pwd"=>"11" ]
     * @return string 通过返回true，未通过返回异常信息
     */
    public function check(array $data=[]):string
    {
        $result = [];
        foreach($this->rules as $key=>$rule)
        {
            if( !isset($data[$key]) ){
                $data[$key] = "";
            }

            if( !is_array($this->rules[$key]) )
            {
                throw new BaseException("Rule of field(".$key.") must be array");
            }

            if ($this->isLinearArray($rule)) { //一维数组
                foreach ($rule as $singleRule) {
                    $ruleDetail = $this->getFunAndPara($singleRule);
                    $result[] = $this->getValidateReturn($ruleDetail[0], $data[$key], $key, $ruleDetail[1]);
                }
            } else {  //二维数组
                $ruleArr = $rule[0];
                $messArr = $rule[1];
                for ($i = 0; $i < count($ruleArr); $i++) {
                    $ruleDetail = $this->getFunAndPara($ruleArr[$i]);
                    $result[] = $this->getValidateReturn($ruleDetail[0], $data[$key], $key, $ruleDetail[1], $messArr[$i]);
                }
            }
        }

        return $this->getValidateResult($result);
    }

    /*
     * 通过返回true,未通过返回异常信息
     * @param res array
     * @return string
     */
    protected function getValidateResult(array $res):string
    {
        $flag = true;
        $mess = "Validate failed: ";
        foreach ($res as $v){
            if(true !== $v){
                $flag = false;
                $mess .= $v . ". ";
            }
        }
        return $flag?"true":$mess;
    }

    /*
     * @param function string 验证函数
     * @param value string 待验证值
     * @param key string 待验证字段
     * @param paras array 验证函数的参数
     * @param message string 未通过提示
     * @return mixed bool/string 通过返回true, 未通过返回提示信息
     */
    protected function getValidateReturn(string $function,string $value,string $key="",array $paras=[],string $message="")
    {
        if( $this->$function($value,$paras) ){
            return true;
        }else{
            $mess = "";
            if($message){
                $mess .= $message;
            }elseif(isset($this->message[$key])){
                $mess .= $this->message[$key];
            }else{
                $mess .= "字段" . $key . "未通过". $function . "验证";
            }
            return $mess;
        }
    }

    /*
     * 查看验证函数是否带参数
     * @param m string
     * @return array [$function, $para], 不带参数时,$para为空数组
     */
    protected function getFunAndPara(string $m):array
    {
        $pos = strpos($m,":");
        if ( false !== $pos ){
            $fun = substr($m,0, $pos);
            $para = explode(",", substr($m,$pos+1));
            return [$fun, $para];
        }else{
            return [$m,[]];
        }
    }

    /*
     * 验证数组是否为一维数组, true: 一维数组, false:多维数组
     * @param arr array
     * @return bool
     */
    protected function isLinearArray(array $arr):bool
    {
        if( count($arr) != count($arr, COUNT_RECURSIVE) ){
            return false;
        }else{
            return true;
        }
    }

    /*
     * 验证是否是空字符串
     * @param value string
     * @return void
     */
    protected function emptyReturnTrue(string $value):bool
    {
        return (""===$value)?true:false;
    }

    /*
     * 以下为默认验证规则
     * @param value string
     * @return bool 通过验证为True，未通过验证为False
     */

    //必填
    public function isRequired(string $value):bool
    {
        return (empty($value) && "0"!==$value && 0!==$value)?false:true;
    }

    //正整数
    public function isPositiveInt(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ( is_numeric($value) && is_int($value+0) && ($value+0)>0 )?true:false;
    }

    //非负整数
    public function isNonNegetiveInt(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ( is_numeric($value) && is_int($value+0) && ($value+0)>=0 )?true:false;
    }

    //整数
    public function isInt(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ( is_numeric($value) && is_int($value + 0) )?true:false;
    }

    //数组
    public function isArray(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return is_array($value);
    }

    //用户名，默认包含中文/英文字母/数字/下划线
    public function isChsUsername(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = '/[\w\x{4e00}-\x{9fa5}]+/u';
        return preg_match($pattern,$value)?true:false;
    }

    //用户名，默认大小写字母、数字和下划线的组合，长度6-20之间
    public function isUsername(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = Config::getConfig("validate.username");
        if(!$pattern)
        {
            $pattern = "/^[a-zA-Z0-9_]{6,20}$/";
        }
        return preg_match($pattern,$value)?true:false;
    }

    //密码，默认大小写字母、数字以及特殊字符(_@#.)的组合，长度6-20之间
    public function isPassword(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = Config::getConfig("validate.password");
        if(!$pattern)
        {
            $pattern = "/^[a-zA-Z0-9_]{6,20}$/";
        }
        return preg_match($pattern,$value)?true:false;
    }

    //电子邮箱
    public function isEmail(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i";
        return preg_match($pattern,$value)?true:false;
    }

    //手机号码
    public function isMobile(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = "/^(13|14|15|17|18)\d{9}$/";
        return preg_match($pattern,$value)?true:false;
    }

    //纯字母 [A-Za-z]
    public function isAlpha(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ctype_alpha($value);
    }

    //纯数字 (包含float/int)
    public function isNumeric(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return is_numeric($value);
    }

    //数字和字母组成的字符串
    public function isAlnum(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ctype_alnum($value);
    }

    //日期 2012-01-12
    public function isDate(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = "/^\d{4}-\d{1,2}-\d{1,2}/";
        return preg_match($pattern,$value)?true:false;
    }
    //网址 http(s)://www.ueecms.com/
    public function isURL(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = "/[http|https]:[\/]{2}[a-z\-]+[.]{1}[a-z\d\-]+[.]{1}[a-z\d]*[\/]*[A-Za-z\d]*[\/]*[A-Za-z\d]*[.]*/";
        return preg_match($pattern,$value)?true:false;
    }

    //IP地址 0.0.0.0 - 255.255.255.255
    public function isIP(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $pattern = "/^(((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))\.){3}((1?\d{1,2})|(2[0-4]\d)|(25[0-5]))$/";
        return preg_match($pattern,$value)?true:false;
    }

    //布尔值	"true" / "false"
    public function isBool(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ( "true" === strtolower($value) || "false" === strtolower($value) )?true:false;
    }

    //字符串长度范围
    public function LengthWithin(string $value,int $min,int $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        $len = strlen($value);
        return ($len>=$min && $len<=$max)?true:false;
    }

    //字符串最小长度
    public function LengthOver(string $value,int $min):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return (strlen($value) >= $min)?true:false;
    }

    //字符串最大长度
    public function LengthBelow(string $value,max $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return (strlen($value) <= $max)?true:false;
    }

    //字符串（一般指数字）在指定的字符集之中
    public function numIn(string $value,array $arr):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return in_array($value,$arr)?true:false;
    }

    //字符串（一般指数字）在指定的字符集之中
    public function numNotIn(string $value,array $arr):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return in_array($value,$arr)?false:true;
    }

    //数值范围(值必须为纯数字)
    public function numWithin(string $value,int $min,int $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(!$this->isNumeric($value)) return false;
        return ($value>=$min && $value<=$max)?true:false;
    }

    //数值范围(值必须为纯数字)
    public function numWithout(string $value,int $min,int $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(!$this->isNumeric($value)) return false;
        return ($value>=$min && $value<=$max)?false:true;
    }

    //数值最小(值必须为纯数字)
    public function numOver(string $value,int $min):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(!$this->isNumeric($value)) return false;
        return ($value>=$min)?true:false;
    }

    //数值最大(值必须为纯数字)
    public function numBelow(string $value,int $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(!$this->isNumeric($value)) return false;
        return ($value<=$max)?true:false;
    }

    //日期之前	2012-01-12
    public function dateBefore(string $value,int $max):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(!$this->isDate($value)) return false;
        $valDate = explode("-",$value);
        $maxDate = explode("-",$value);
        if($valDate[0]<$maxDate[0]){
            return true;
        }elseif($valDate[0]>$maxDate[0]){
            return false;
        }elseif($valDate[1]<$maxDate[1]){
            return true;
        }elseif($valDate[1]>$maxDate[1]){
            return false;
        }elseif($valDate[2]<$maxDate[2]){
            return true;
        }else{
            return false;
        }
    }

    //文件验证
    public function isFile(string $value):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return is_file($value);
    }

    //图片后缀验证 默认后缀 png/jpg/jpeg/gif
    public function isImage(string $value,array $arr):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        if(empty($arr)){
            $arr = ["jpg","jpeg","png","gif"];
        }
        return in_array($value,$arr)?true:false;
    }

    //文件后缀
    public function isEXT(string $value,array $arr):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return in_array($value,$arr)?true:false;
    }

    //文件大小	fileSizeBeflow()
    public function fileSizeBeflow(string $value,int $size):bool
    {
        if($this->emptyReturnTrue($value)) return True;
        return ($value<=$size)?true:false;
    }
}

