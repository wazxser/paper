<?php
namespace Home\Controller;
use Think\Controller;
class ZhuceController extends Controller {
    public function zhuce(){
        if($_SESSION['name']){
            echo "<script>alert('已登录');</script>";
            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Lunwen/lunwen';</script>";
        }
        $this->show();

        $conn = M('user');

        $pwdcon = I('pwdcon');
        $reg['name'] = $name = I('name');
        $pwd = I('pwd');
        $reg['score'] = 10;
        $reg['limit'] = 1;
        $reg['time'] = date("Y-m-d H:i:s");

        if( I('post.') ) {
            if (empty($name) || empty($pwd) || empty($pwdcon) )
                echo "<script>alert('请输入用户名和密码');</script>";
            else {
               // echo $uid;
                $testUser['name'] = $name;
                //echo $testUser['uid'];
                $have = $conn->where($testUser)->find();
               // print_r($have);
                if ($have) {
                    echo "<script>alert('用户已存在');</script>";
                } else {
                    if ($pwd != $pwdcon) {
                        echo "<script>alert('请再次确认密码');</script>";
                    } else {
                        $reg['pwd'] = md5($pwd);
                        $active = $conn->add($reg);

                        if ($active) {
                            echo "<script>alert('注册成功，免费获得10积分,请登录');</script>";
                            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/denglu';</script>";
                        }
                    }
                }
            }
        }
    }
}