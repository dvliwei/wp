<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 下午2:56
 */



class MakeupModel
{
    protected  $db ;
    public function __construct()
    {

        $this->db = new DB(2);

    }
}