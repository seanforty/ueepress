<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/9
 * Time: 7:06
 */
declare(strict_types=1);
namespace app\libs\validate;

use app\api\exception\AdminAddException;
use app\api\exception\ParameterException;
use libs\Request;
use libs\Validate;

class BaseValidate extends Validate
{
    public function goCheck(array $data=[])
    {
        if(!$data){
            $data = Request::param();
        }

        $res = $this->check($data);
        if("true"!==$res)
        {
            throw new ParameterException($res);
        }

    }
}