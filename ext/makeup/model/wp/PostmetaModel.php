<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 下午5:03
 */
include_once 'WpModel.php';
class PostmetaModel extends  WpModel
{

    public function __construct()
    {
        parent::__construct();
    }


    protected $table = 'wp_postmeta';

    protected $pk	 = 'meta_id';

    public function insert($post_id)
    {
       $meta_keys = ['_edit_last'=>'1' , '_edit_lock'=>time().':1' , '_thumbnail_id'=>$post_id+1];
       foreach ($meta_keys as $key=>$value)
       {
           $model = new self();
           $model->post_id = $post_id;
           $model->meta_key =  $key;
           $model->meta_value = $value;
           $id = $model->create();
       }

       $model = new self();
       $model->post_id = $post_id+1;
       $model->meta_key = '_wp_attachment_metadata';
       $model->meta_value = 'a:4:{s:5:"width";i:320;s:6:"height";i:180;s:4:"file";s:13:"mqdefault.jpg";s:5:"sizes";a:1:{s:4:"full";a:3:{s:5:"width";i:320;s:6:"height";i:180;s:4:"file";s:13:"mqdefault.jpg";}}}';
       $id = $model->create();
    }

}