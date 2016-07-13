<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Account;
//use app\models\ContactForm;

class IndexController extends Controller
{
    public $layout='menu.php';//替换yii原模板
    public $enableCsrfValidation = false; //接post值时开启
    public function actionIndex(){
        //登录成功跳转此页面否则禁止进入
        $session  = Yii::$app->session;
        $username = $session->get('username');
        if($username){
            return $this->render("index.html",['username'=>$username]);
        }else{
            echo "<script> alert('请先登录') ;</script>";
            return $this->redirect("index.php?r=login/login");
        }
    }
    //微信公众号添加
    public function actionIndex_1(){
        //登录成功跳转此页面否则禁止进入
        $session  = Yii::$app->session;
        $username = $session->get('username');//接session值用于判断是否已经登录
        $request = Yii::$app->request;//用于判断对否有post值传进来
        if($username){
            if($request->isPost){
                $wx_name   = $request->post('wx_name');//微信公众号
                $wx_appid  = $request->post('wx_appid');//18位
                $wx_secret = $request->post('wx_secret');//32位
                $wx_remark   = $request->post('wx_remark');//备注
                $wx_time   = date('Y-m-d H:i:s',time());//备注

                //此处应做微信公众号是否填写正确以及是否相应的值是否符合要求

                //  echo $wx_name;
                $data =  Yii::$app->db->createCommand()->batchInsert('wex_account', ['wx_name', 'wx_appid','wx_secret','wx_remark','wx_time'], [
                    ["$wx_name", "$wx_appid","$wx_secret","$wx_remark","$wx_time"],
                ])->execute();
                if($data){
                    return $this->redirect("index.php?r=index/index_2");
                }else{
                    return $this->render("index_1.html") ;
                }
            }else{
                return $this->render("index_1.html") ;
            }
        }else{
            echo "<script> alert('请先登录') ;</script>";
            return $this->redirect("index.php?r=login/login");
        }
    }
    //管理微信公众号(查询分页展示)
    public function actionIndex_2(){
        $request = Yii::$app->request;//用于判断对否有post值传进来
        $sum   = Account::find()->asArray()->count(); //查询总条数  echo $titles;die;
        $strip = 2;                                  //设置每页展示条数
        $pages = ceil($sum/$strip);                 //计算总页数    echo $pages;
        if($request->get('page')){
            $page = $request->get('page');
        }else {
            $page = 1;//获取当前页
        }
        $offset = ($page-1)*$strip;//计算偏移量
        $up    = $page<1?1:$page-1;//上一页
        $down  = $page>$pages?$pages:$page+1; //下一页
        $data   = Account::find()->offset($offset)->limit($strip)->asArray()->all(); //查询总条数  echo $titles;die;
        //  Article::find()->where([‘status’=>‘1’])->orderBy(‘dateDESC’)->offset(5)->limit(3)->all();
        // print_r($data);

        //查询数据展示
    }
}
