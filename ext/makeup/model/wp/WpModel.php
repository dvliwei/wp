<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 下午3:22
 */


include_once(__DIR__ .'/../../db/easyCRUD.class.php');

class WpModel extends  Crud
{
    public function __construct()
    {
        parent::__construct();
    }

}