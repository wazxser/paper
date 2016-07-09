<?php
namespace Home\Controller;
use Think\Controller;
class LunwenController extends Controller {
    public $info = array();

    public function lunwen(){
        $conn = M('wenzi');

        session_start();

        if($_SESSION){
            $name = $_SESSION['name'];
            $score = $_SESSION['score'];

            $this->assign('name', $name);
            $this->assign('score', $score);
        }

        if(I('post.key')){
            $key = I('post.key');

            $where['title'] = $key;
            $where['keyword'] = array('like', '%'.$key.'%');
            $where['_logic'] = 'or';
            $this->info = array();
            $this->info = $conn->where($where)->order('ctime desc')->select();
            if($this->info == null){
                echo '<script>alert("无查找结果");</script>';
                $list = $conn->select();
            }else{
                $list = $this->info;
            }
        }else{
            $list = $conn->order('ctime desc')->select();
        }
        //print_r($list);
        $this->assign('list', $list);
        $this->show();
    }

    public function chakan(){
       // $this->show();
        $conn = M('wenzi');

        session_start();

        $name = $_SESSION['name'];
        $score = $_SESSION['score'];

        $this->assign('name', $name);
        $this->assign('score', $score);


        $id = $wenzi['id'] = I('get.id');
        $neirong = $conn->where($wenzi)->select();
        $this->assign('title', $neirong[0]['title']);
        $this->assign('keyword', $neirong[0]['keyword']);
        $this->assign('content', $neirong[0]['content']);
        $this->assign('up', $neirong[0]['up']);
        $this->assign('value', $neirong[0]['value']);
        $this->assign('id', $neirong[0]['id']);
        $this->assign('ctime', $neirong[0]['ctime']);
        $this->assign('filename', $neirong[0]['filename']);

        $concom = M('comment');

        $comment['content'] = I('post.content');
        $comment['user'] = $_SESSION['name'];
        $comment['wenziID'] = $neirong[0]['id'];
        $comment['ctime'] = date("Y-m-d H:i:s");

        if( I('post.content') ){

            if(!$_SESSION['name']){
                echo '<script>alert("请先登录");</script>';
                echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/denglu';</script>";
            }else{
                $com = false;
                $conDown = M('download');
                $where['wenziId'] = $id;
                $downuser = $conDown->where($where)->field('uid')->select();
                foreach($downuser as $uservalue){
                    if( $uservalue['uid'] == $_SESSION['id']){
                        $com = true;
                    }
                }
                if(!$com){
                    echo '<script>alert("下载论文后可进行评论");</script>';
                } else {
                    $comment['content'] = I('post.content');
                    if(empty($comment['content'])){
                        echo '<script>alert("输入为空")</script>';
                    }else{
                        $pinglun = $concom->add($comment);
                        if($pinglun){
                            echo '<script>alert("评论发表成功")</script>';
                        }else{
                            echo '<script>alert("评论发表失败")</script>';
                        }
                    }
                }
            }


        }

        $wenziID['wenziID'] = $wenzi['id'];
        $com = $concom->where($wenziID)->select();
        $this->assign('com', $com);

        $this->show();
    }

    public function download(){
        if(!$_SESSION['name']){
            echo '<script>alert("请先登录");</script>';
            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/denglu';</script>";
        }

        $conn = M('wenzi');

        $id = $wenzi['id'] = I('get.id');

        //若用户之前下载过该文档，则不扣除积分
        $conDown = M('download');

        $where['uid'] = $_SESSION['id'];
        $haveDown = $conDown->where($where)->field('wenziID')->select();
        $cut = true;
        foreach ($haveDown as $haveDwonID){
            if($id == $haveDwonID['wenziid']){
                $cut = false;
            }
        }

        //若用户之前未下载过，则下入download表，并扣除积分
        if($cut == true){
            $down['uid'] = $_SESSION['id'];
            $down['wenziID'] = $conn->where($wenzi)->getField('id');
            $save0 = $conDown->add($down);

            //取得下载该论文的积分值
            $value = $conn->where($wenzi)->getField('value');

            if($_SESSION['score'] < $value){
                echo '<script>alert("积分值不足");</script>';
                echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Lunwen/chakan?id=$id';</script>";
            }
            else {
                $conUser = M('user');

                //扣除下载用户的积分
                $where['name'] = $_SESSION['name'];
                $_SESSION['score'] = $_SESSION['score'] - $value;
                $score['score'] = $_SESSION['score'];
                $save1 = $conUser->where($where)->save($score);

                //将积分加入到文件上传者中
                $where['name'] = $conn->where($wenzi)->getField('up');
                $up['score'] = $conUser->where($where)->getField('score');
                $up['score'] = $up['score'] + $value;
                $save2 = $conUser->where($where)->save($up);

                //论文下载次数加1
                $down = $conn->where($wenzi)->getField('downtimes');
                $downs = $down + 1;
                $times['downtimes'] = $downs;
                $where['id'] = $id;
                $save3 = $conn->where($where)->save($times);

                if ($save0 == false || $save1 == false || $save2 == false || $save3 == false) {
                    echo '<script>alert("操作失败");</script>';
                    echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Lunwen/chakan?id=$id';</script>";
                    exit;
                }
            }
        }

        //下载文件
        $_file = $conn->where($wenzi)->getField('filepath');
        $filename = $conn->where($wenzi)->getField('filename');
        $path1 = substr($_file, 0, 10);
        $path2 = substr($_file, 11);
        $prePath = dirname(dirname(dirname(dirname(__FILE__))));
        $filePath = $prePath.DIRECTORY_SEPARATOR."Public".DIRECTORY_SEPARATOR."wenzi".DIRECTORY_SEPARATOR.$path1.DIRECTORY_SEPARATOR.$path2;
        download($filename, $filePath);
    }
}

//$fpath为下载文件所在文件夹
function download($fname,$fpath){

    //避免中文文件名出现检测不到文件名的情况，进行转码utf-8->gbk
    $filename=iconv('utf-8','gb2312',$fname);
    $path=$fpath;
    if(!file_exists($path)){//检测文件是否存在
        echo"文件不存在！";
        die();
    }

    $fp=fopen($path,'r');//只读方式打开
    $filesize=filesize($path);//文件大小

    //返回的文件(流形式)
    header("Content-type: application/octet-stream");
    //按照字节大小返回
    header("Accept-Ranges: bytes");
    //返回文件大小
    header("Accept-Length: $filesize");
    //这里客户端的弹出对话框，对应的文件名
    header("Content-Disposition: attachment; filename=".$filename);
    ob_clean();
    flush();
    //设置分流
    $buffer=1024;
    //来个文件字节计数器
    $count=0;
    while(!feof($fp)&&($filesize-$count>0)){
        $data=fread($fp,$buffer);
        $count+=$data;//计数
        echo$data;//传数据给浏览器端
    }

    fclose($fp);
}
?>




