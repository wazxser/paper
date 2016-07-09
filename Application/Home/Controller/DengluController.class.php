<?php
namespace Home\Controller;
use Think\Controller;
class DengluController extends Controller {
    public function denglu(){
        if($_SESSION['name']){
            echo "<script>alert('已登录');</script>";
            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Lunwen/lunwen';</script>";
        }
        $this->show();

        $conn=M("user");

        $name=I("name");
        $pwd=I("pwd");

        session_start();

        if( I('post.') ) {
            if (empty($name) or empty($pwd)) {
                echo "<script>alert('请输入用户名和密码');</script>";
            } else {
                $config = $conn->where("name= '$name'")->select();
                if ($config[0]['name'] === null) {
                    echo "<script>alert('用户不存在');</script>";
                } else {
                    $testPwd = $config[0]['pwd'];
                    if ($testPwd != md5($pwd)) {
                        echo "<script>alert('密码错误');</script>";
                    } else {
                        echo "<script>alert('登录成功');</script>";
                        $right = $conn->where("name= '$name'")->getField('limit');
                        if ($right == 0) {
                            //echo "tiaozhuan";
                            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/manage';</script>";
                        } else{
                            echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Lunwen/lunwen';</script>";
                        }
                        $_SESSION['id'] = $conn->where("name= '$name'")->getField('id');
                        $_SESSION['name'] = $name;
                        $_SESSION['score'] = $conn->where("name= '$name'")->getField('score');
                    }
                }
            }
        }
    }

    public function manage(){
        $conn = M('user');

        $users = $conn->where('id>14')->select();
        $this->assign('users', $users);
        $this->show();
    }

    public function delete(){
        $conn = M('user');
        $id = I('get.id');
        $data['id'] = $id;
        $name = $conn->where($data)->getField('name');
        $delete = $conn->where($data)->delete();
        if($delete){
            echo "<script>alert('Delete successfully');</script>";
            exit(0);
        }

        //echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/manage';</script>";
    }

    public function modify(){
        $conn = M('user');
        $id = I('get.id');
        //echo $where['id'];
        $this->assign('id', $id);
        $where['id'] = I('get.id');
        $pwd = I('post.pwd');
        $data['pwd'] = md5($pwd);
        $this->show();
        if( I('post.pwd') ){
            $xiugai = $conn->where($where)->save($data);
            if($xiugai){
                echo "<script>alert('操作成功');</script>";
                echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/paper/index.php/Home/Denglu/manage';</script>";
            }else{
                echo "<script>alert('操作失败');</script>";
                echo "<script>window.location.href='http://2015new.wenjin.in/wangyuehuan/index.php/Home/Denglu/manage';</script>";
            }
        }
    }
}