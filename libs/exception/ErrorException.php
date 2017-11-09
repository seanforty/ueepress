<?php
/**
 * Created by UeePress.
 * User: sean
 * Date: 2017/9/11
 * Time: 7:10
 */
declare (strict_types=1);
namespace libs\exception;

use Throwable;

class ErrorException extends \Exception
{
    protected $severity;    //int
    public function __construct(int $strno,string $errstr,string $errfile="",int $errline=0)
    {
        $this->severity = $strno;
        $this->message = $errstr;
        $this->file = $errfile;
        $this->line = $errline;
        $this->code = 0;
    }
}