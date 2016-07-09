<?php
namespace Home\Controller;
use Think\Controller;
class ShangchuanController extends Controller {

    public $wenzi = array();

    public function shangchuan(){

        if($_SESSION['name'] == null){
            echo '<script>alert("请先登录")</script>';
            echo "<script>window.location.href='http://2015new.wenjin.in//wangyuehuan/paper/index.php/Home/Denglu/denglu';</script>";
        }
        if($_SESSION){
            $name = $_SESSION['name'];
            $score = $_SESSION['score'];

            $this->assign('name', $name);
            $this->assign('score', $score);
        }
        $this->show();

        $conn = M('wenzi');

       $wenzi['title'] = I('post.title');
       $wenzi['keyword'] = I('post.keyword');
       $wenzi['content'] = I('post.content');
       $wenzi['value'] = intval( I('value') );
       $wenzi['ctime'] = date("Y-m-d H:i:s");
       $wenzi['downtimes'] = 0;
       $wenzi['up'] = $_SESSION['name'];
       // $conn->add(array('filename' => '123'));
       $wenzi['filepath'] = $this->upFile();
       $wenzi['filename'] = $_FILES["file"]["name"];

        if( I('post.') ){
            if(!($wenzi['value'])){
                echo '<script>alert("积分请输入数字");</script>';
            }else if($wenzi['value'] > 100 || $wenzi['value'] < 0){
                echo '<script>alert("积分请输入0-100数字");</script>';
            }
            else {
                if (empty($wenzi['title']) || empty($wenzi['keyword']) || empty($wenzi['content']) || $_FILES['file'] == null) {
                    echo '<script>alert("请填写完整信息");</script>';
                } else {
                   // print_r($wenzi);
                    $shangchuan = $conn->add($wenzi);
                    if ($shangchuan) {
                        echo '<script>alert("分享成功")</script>';
                    } else {
                        echo '<script>alert("分享失败")</script>';
                    }
                }
            }
        }
    }

    public function upFile(){
        import('@.ORG.NET.UploadFile');
        $upFile = new \Think\Upload();
        $upFile->maxSize = 10485760;
        $upFile->allowExts = array('doc', 'txt', 'pdf');
        $upFile->rootPath = "./Public/wenzi/";
        $upFile->savePath = "";
        $info = $upFile->upload();
        if($info){
            $filepath = array($info['file']['savepath'], $info['file']['savename']);
            return implode('', $filepath);
        }
    }
}