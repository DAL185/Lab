<?php
require_once"config.php";
if($_GET['action']=='login') {
    global $conn;
    extract($_POST);
    if ($roles == '学生') {
        if  (!empty($password1)) {
            $sql = "insert into st(no,name,school,major,password,roles) values('$no','$name','$school','$major','$password','$roles')";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_affected_rows($conn);
            if ($row > 0) {

                $_SESSION['no'] = $no;
                $_SESSION['roles'] = $roles;
                $_SESSION['name']= $row['name'];
                echo json_encode(array("role"=>$roles,"flag"=>"注册成功"));
            } else {
                echo json_encode(array("role"=>null,"flag"=>"注册失败"));
            }

        } else {
            $sql = "select * from st where no='$no' and password='$password'and roles='$roles'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);
            if ($row > 0) {

                $_SESSION['no'] = $no;
                $_SESSION['roles'] = $roles;
                $_SESSION['name'] = $row['name'];
                echo json_encode(array("role" => $roles, "flag" => "注册成功"));
            } else {
                echo json_encode(array("role" => null, "flag" => "注册失败"));
            }
        }
    } else {
        if ($password1 <> null) {
            $sql = "insert into st(no,name,school,major,password,roles) values('$no','$name','$school','$major','$password','$roles')";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_affected_rows($conn);
            if ($row > 0) {

                $_SESSION['no'] = $no;
                $_SESSION['roles'] = $roles;
                $_SESSION['name'] = $row['name'];
                echo json_encode(array("role"=>$roles,"flag"=>"登录成功"));
            } else {
                echo json_encode(array("role"=>null,"flag"=>"登录失败"));
            }
        } else {
            $sql = "select * from st where no='$no' and password='$password'and roles='$roles'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);
            if ($row > 0) {


                $_SESSION['no'] = $no;
                $_SESSION['roles'] = $roles;
                $_SESSION['name'] = $row['name'];

                echo json_encode(array("role"=>$roles,"flag"=>"登录成功"));
            } else {
                echo json_encode(array("role"=>null,"flag"=>"登录失败"));
            }
        }

    }
}
elseif($_GET['action']=="userinfo") {
    $sql = "select no,name,school,major from st where no=$_SESSION[no] ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("no" => 0));
    }
}

else if($_GET['action']=="update"){
    global $conn;
    extract($_POST);
    $sql="update st set name='$name',major='$major',school='$school' where no='$_SESSION[no]'";
    mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "修改成功";
        return 1;
    } else {
        echo "修改失败";
        return 0;
    }
}



if($_GET['action']=="logout") {
    $_SESSION['no'] =null;
    $_SESSION['roles'] = null;
    $_SESSION['name'] = null;
    header("location:admin-login.php");
}
$conn=null;
?>