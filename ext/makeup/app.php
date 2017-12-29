<?php
/**
 * 美妆数据插入
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/12/28
 * Time: 上午11:36
 */


set_time_limit(600);

//设定页面编码
header("Content-Type:text/html;charset=utf-8");
//设定时区
date_default_timezone_set('Asia/Shanghai');

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include_once('db/Db.class.php');
include_once('model/makeup/ArticlesModel.php');
include_once('model/wp/PostsModel.php');
include_once('model/wp/PostmetaModel.php');
include_once('model/wp/TermTaxonomyModel.php');


//读取数据

$model = new ArticlesModel();
$makeup_datas = $model->get_new_article_with_date('2017-12-15');

$c =0 ;
foreach ($makeup_datas as $data){
    //数据处理
    $title = $data['title'];
    $url = $data['url'];
    $keywords = $data['keywords'];
    $thumbnail = $data['thumbnail'];
    $type = 2;/*视频*/


    //插入数据
    $postModel = new PostsModel();
    $post_id = $postModel->insert($title ,$url , $keywords ,$thumbnail , $type );


    $postmetaModel = new PostmetaModel();
    $postmetaModel->insert($post_id);

    $termModel = new TermTaxonomyModel();
    $termModel->cumulative_count($type);

    $str = dd($c);
    echo   $data['urlID']."ok".$str." \n" ;
    $c++;
}


function dd($c =0)
{
    $str = '.';
    for($i = 0 ; $i<=$c ; $i++)
    {
        $str = $str.'.';
    }
    return $str;
}


