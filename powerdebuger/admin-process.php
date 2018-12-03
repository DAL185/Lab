<?php
require_once"config.php";
if($_GET['action']=="submit"){
    global $conn;
    extract($_POST);
    $recid=time();
    $sql="insert into helprecord(errtitle,errcontent,recid,no,name,roles) VALUES('$errtitle','$errorcontent','$recid','$_SESSION[no]','$_SESSION[name]','$_SESSION[roles]')";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if ($row>0){
        echo "提交成功";
        $_SESSION['errtitle']=$errtitle;
        return 1;
    } else {
        echo "提交失败";
        return 0;
    }

}

elseif($_GET['action']=="myquestions"){
    $sql="SELECT distinct s.adoptedsolutionid,h.errtitle,s.sno FROM helprecord h LEFT JOIN  solution s ON h.recid=s.recid where h.no=$_SESSION[no] ORDER BY h.recid DESC LIMIT 10";
    $res=mysqli_query($conn,$sql);
    $currerr="";
    $content=array();
    $dl=array();
    while($row=mysqli_fetch_array($res)){
        if ($currerr <> $row["errtitle"]) {
            if(!empty($currerr)) {
                $dl["content"].="</ul>";
                $content[]=$dl;
            }
            $dl=array("title"=>$row["errtitle"],"content"=>"<ul sid=$row[adoptedsolutionid] class='am-list am-margin-bottom-0'>");
            $currerr = $row["errtitle"];
        }
        $dl["content"].="<li class='sno'>$row[sno]</li>";
    }
    if(!empty($content)){
        $dl["content"].="</ul>";
        $content[]=$dl;

    }
    $res= array("accordionData"=>array("theme"=>"basic","content"=>$content));
    echo json_encode($res);

}

elseif($_GET['action']=="otherquestions"){
    $sql="SELECT distinct recid,errtitle  FROM helprecord where no<>'$_SESSION[no]' ORDER BY recid DESC LIMIT 10";
    $res=mysqli_query($conn,$sql);
    $str="<ul class='am-list am-margin-bottom-0'>";
    while($row=mysqli_fetch_array($res)){
        $str.="<li class='othererrtitle' rid='$row[recid]'>$row[errtitle]</li>";
    }
    $str.="</ul>";
    echo $str;
}

else if($_GET['action']=="answerin"){
    global $conn;
    $sid=time();
    $rid=$_POST['rid'];
    $solutioncontent=$_POST['answercontent'];
    $sql="insert into solution(sno,solutioncontent,adoptedsolutionid,recid) VALUES ('$_SESSION[no]','$solutioncontent','$sid','$rid')";
    mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "解答成功";
    } else {
        echo "解答失败";
    }
}


elseif ($_GET['action']=="answerfrom"){
    global $conn;
    $sno=$_GET['sno'];
    $sid=$_GET['sid'];
    $sql="SELECT distinct h.errtitle,s.solutioncontent FROM helprecord h RIGHT JOIN  solution s ON h.recid=s.recid where sno=$sno and s.adoptedsolutionid=$sid";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row){
        echo json_encode($row);
    } else {
        echo json_encode(0);
    }
}

elseif($_GET['action']=="evaluate"){
    global $conn;
    $myevaluate=$_POST['myevaluate'];
    $sno=$_POST['sno'];
    $sid=$_POST['sid'];
    $sql="update solution set evaluate='$myevaluate' where adoptedsolutionid='$sid'and sno='$sno'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if ($row>0){
        echo "评价成功";
        return 1;
    } else {
        echo "评价失败";
        return 0;
    }
}
   $conn=null;
?>