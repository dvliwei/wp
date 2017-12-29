<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 下午2:55
 */
include_once 'MakeupModel.php';
class ArticlesModel extends  MakeupModel
{

    public function __construct()
    {

        parent::__construct();
    }


    protected $tablename = 'articles';

    public  function get_new_article_with_date($date='')
    {
        $rows = $this->db->query("SELECT * FROM {$this->tablename} WHERE date=:date AND title !='' AND thumbnail !='' ",['date'=>$date]);
        return $rows;
    }
}