<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/29
 * Time: 上午10:06
 */
include_once 'WpModel.php';

class TermTaxonomyModel extends  WpModel
{


    public function __construct()
    {
        parent::__construct();
    }


    protected $table = 'wp_term_taxonomy';

    protected $pk	 = 'term_taxonomy_id';


    public function cumulative_count($id)
    {
        $model = new self();
        $row  = $model->find($id);
        $model->term_taxonomy_id = $id;
        $model->count =$row['count']+1;
        if($model->save()){
            return true;
        }
    }


}