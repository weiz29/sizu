<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;

class IndexController extends Controller
{
  public $layout='menu.php';//替换yii原模板
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

}
