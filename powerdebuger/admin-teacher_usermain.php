<?php
require_once"config.php";
if($_GET['action']=="class_submit"){
    global $conn;
    extract($_POST);
    $lno=time();
    $sql="insert into lesson (lno,lname,lclass,ltime) VALUES ('$lno','$lname','$lclass','$ltime')";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "制定成功";

    } else {
        echo "制定失败";

    }
}
/* elseif($_GET['action']=="classinfo"){
    global $conn;
    $lno=$_GET['m_lno'];
    $sql="select lname,lclass,ltime from lesson where lno='$lno'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("lno" => 0));
    }
}*/

else if($_GET['action']=="class_update"){
    global $conn;
    $lno=$_POST['lno1'];
    extract($_POST);
    $sql="update lesson set lname='$lname',lclass='$lclass',ltime='$ltime' where lno='$lno'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "修改成功";

    } else {
        echo "修改失败";

    }
}

elseif($_GET['action']=="class_delete"){
    global $conn;
    $lno=$_GET['_lno'];
    $sql="select * from experiment where lno='$lno'";
    $res1=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_array($res1);
    if ($row1) {
        echo "该课程里有实验内容，不可删除";

    } else{

        $sql="delete  from lesson where lno=$lno";
        $res=mysqli_query($conn,$sql);
        $rownum=mysqli_affected_rows($conn);
        if ($rownum>=0) {
            echo "删除成功";

        } else {
            echo "删除失败";

        }
    }
}

elseif($_GET['action']=="experiment_submit"){
    global $conn;
    extract($_POST);
    $eno=time();
    $lno=$_POST['lno2'];
    $sql="insert into experiment (lno,eno,ename,espot,etime,eaim,econtent,esurrounding) VALUES ('$lno','$eno','$ename','$espot','$etime','$eaim','$econtent','$esurrounding')";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>0) {
        echo "添加成功";

    } else {
        echo "添加失败";

    }
}

elseif($_GET['action']=="start_experiment"){
    global $conn;
    $eno1=$_GET['eno1'];
    $sql="select * from experiment where eno='$eno1'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("eno1" => 0));
    }
}

elseif($_GET['action']=='experiment_update'){
    global $conn;
    extract($_POST);
    $sql="update experiment set ename='$each_name',espot='$each_spot',etime='$each_time',eaim='$each_aim',econtent='$each_content',esurrounding='$each_surrounding',estart='$estart' where eno='$eno'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if ($row>=0) {
        echo "保存成功";
    } else {
        echo "保存失败";
    }
}

elseif($_GET['action']=="student_submit"){
    global $conn;
    extract($_POST);
    $sql="insert into manageclass (mno,mname,msex,mgrade,mcollege,mremark) VALUES ('$mno','$mname','$msex','$mgrade','$mcollege','$mremark')";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "添加成功";

    } else {
        echo "添加失败";

    }
}

elseif($_GET['action']=="student_update"){
    global $conn;
    extract($_POST);
    $mno1=$_POST['mno1'];
    $sql="update manageclass set mno='$mno',mname='$mname',msex='$msex',mgrade='$mgrade',mcollege='$mcollege',mremark='$mremark' where mno='$mno1'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "修改成功";
    }else{
        echo "修改失败";
    }
}

elseif($_GET['action']=="student_delete"){
    global $conn;
    $mno2=$_GET['mno2'];
    $sql="delete from manageclass where mno='$mno2'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "删除成功";
    }else{
        echo "删除失败";
    }
}

/*elseif($_GET['action']=="student_search"){
    $student_info=$_GET['student_info'];
    $sql = "select * from manageclass where mno='$student_info'or mname='$student_info'or mcollege='$student_info'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("mno" => 0));
    }
}*/
$conn=null;
?>