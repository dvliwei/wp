<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/29
 * Time: 上午10:53
 */

include_once 'WpModel.php';

class TermrelationshipsModel extends  WpModel
{
    public function __construct()
    {
        parent::__construct();
    }


    protected $table = 'wp_term_relationships';

    public  function insert($post_id)
    {


        $term_taxonomy_ids = [2,13,14,18];
        foreach ($term_taxonomy_ids as $term_taxonomy_id)
        {

            $model = new self();
            $model->object_id = $post_id;
            $model->term_taxonomy_id = $term_taxonomy_id;
            $model->create();
        }
    }

}