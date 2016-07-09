<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $time = date("Y-m-d");
        $this->assign('time', $time);

        $connuser = M('user');

        //用户名和积分显示
        if($_SESSION){
            $name = $_SESSION['name'];
            $score = $_SESSION['score'];

            $this->assign('name', $name);
            $this->assign('score', $score);
        }

        //积分最多用户
        $score = $connuser->max('score');
        $hotuser = $connuser->where("score = '$score'")->getField('name');

        $connwenzi = M('wenzi');

        $hotwenzi = $connwenzi->order('downtimes desc')->limit(3)->field('title')->select();
        $hotwenziID = $connwenzi->order('downtimes desc')->limit(3)->field('id')->select();

        print_r($hotwenzi);
        $hot1 = $hotwenzi[0]['title'];
        $hot2 = $hotwenzi[1]['title'];
        $hot3 = $hotwenzi[2]['title'];

        $hot1id = $hotwenziID[0]['id'];
        $hot2id = $hotwenziID[1]['id'];
        $hot3id = $hotwenziID[2]['id'];


        $this->assign('hotuser', $hotuser);
       // $this->assign('score', $score);
        $this->assign('hot1', $hot1);
        $this->assign('hot2', $hot2);
        $this->assign('hot3', $hot3);

        $this->assign('hot1id', $hot1id);
        $this->assign('hot2id', $hot2id);
        $this->assign('hot3id', $hot3id);

        $this->show();
    }

    public function header(){
        $this->display();
    }

    public function footer(){
        $this->show();
    }

    public function logout(){
        session_destroy();
        echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Index/index';</script>";
    }
}