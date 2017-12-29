<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 下午3:22
 */
include_once 'WpModel.php';

class  PostsModel extends  WpModel
{
    public function __construct()
    {
        parent::__construct();
    }


    protected $table = 'wp_posts';

    protected $pk	 = 'ID';

    public function  get_row()
    {
        $model = new self();
        $row = $model->find(33);
        return $row;
    }
    public function  insert($title ,$url ,$keywords, $thumbnail ,$type)
    {
        $date =  date('Y-m-d H:i:s');
        $model = new self();
        $model->post_author =1;
        $model->post_date = $date;
        $model->post_date_gmt =$date;
        $model->post_content ="[embedyt] {$url}[/embedyt]";
        $model->post_title =$title;
        $model->post_excerpt =$keywords;
        $model->post_status ='publish';
        $model->comment_status ='open';
        $model->ping_status ='open';
        $model->post_name =urlencode($title);
        $model->post_modified =$date;
        $model->post_modified_gmt =$date;
        $model->post_parent =0;
        $model->post_type ='post';
        $id = $model->create();
        $guid = 'http://makeup.kukuvideo.com/?p='.$id;

        $model->ID = $id;
        $model->guid =$guid;
        $model->save();

        //插入parent_data
        $model = new self();
        $model->post_author =1;
        $model->post_date = $date;
        $model->post_date_gmt =$date;
        $model->post_content ="[embedyt] {$url}[/embedyt]";
        $model->post_title =$title;
        $model->post_excerpt =$keywords;
        $model->post_status ='inherit';
        $model->comment_status ='closed';
        $model->ping_status ='closed';
        $model->post_name =$id.'-revision-v1';
        $model->post_modified =$date;
        $model->post_modified_gmt =$date;
        $model->post_parent =$id;
        $model->guid =$thumbnail;
        $model->post_type ='revision';
        $model->create();
        return $id;
    }

}