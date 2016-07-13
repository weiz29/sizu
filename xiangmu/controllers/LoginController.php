<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
//use app\models\ContactForm;

class LoginController extends Controller
{
    public $layout='menu.php';//禁yii原模板
    public $enableCsrfValidation = false; //接post值时开启
    //用户登录
    public function actionLogin(){
        $request = Yii::$app->request;
        if($request->isPost){//接收登录信息
            $username = $request->post('username');
            $pwd      = md5($request->post('pwd')) ;
            $titles   =  User::find()->asArray()->where(['u_name'=>$username,'u_pwd'=>$pwd])->one() ;
            if($titles){
                $session = Yii::$app->session;
                $session->set('username', $username);
                $session->set('user_id', $titles['u_id']);
                return $this->redirect("index.php?r=index/index");
            }else{
                echo "<script> alert('用户名或者密码错误') ;</script>";
                return $this->render("login.html");
            }
        }else{
            return $this->render("login.html");
        }
    }
////用户注册   此处省略
//    public function actionRegister(){
//        $request = Yii::$app->request;
//        if($request->isPost){
//            //接收登录信息
//            $username = $request->post('username');
//            //查询用户名是否已经存在
//            $titles =  User::find()->asArray()->where(['user_name'=>$username])->one() ;
//            if($titles):echo "<script>alert('用户名".$username."已存在,请重新输入')</script>" ;  return $this->render("register.html"); endif;
//            $pwd1     = md5($request->post('pwd1'));
//            $pwd2     = md5($request->post('pwd2'));
//            if($pwd2!=$pwd1): echo "<script>alert('两次输入的密码不一样')</script>";return $this->render("register.html"); endif;
//            //入库
//
//
//        }else{
//            return $this->render("register.html");
//        }
//    }

    //退出登录
    public function actionExit(){
        $session = Yii::$app->session;
        $data = $session->remove('username');//删除某一条session数据
        //    $data = $session->destroy();//销毁全部数据
        if($data){
            return $this->render("login.html");
        }else{
            echo 12334;
        }

    }

}
