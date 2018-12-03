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
        return 1;
    } else {
        echo "提交失败";
        return 0;
    }

}

elseif($_GET['action']=="myquestions"){
    $sql="SELECT distinct h.errtitle,s.sno FROM helprecord h LEFT JOIN  solution s ON h.recid=s.recid ORDER BY h.recid DESC LIMIT 10";
    $res=mysqli_query($conn,$sql);
    $currerr="";
    $str="<dl class='am-accordion-item'>";
   
    while($row=mysqli_fetch_array($res)){
        if ($currerr <> $row["errtitle"]) {
            if (!empty($currerr)) $str.= "</ul></div></dd></dl>";
            $str.="<dl class='am-accordion-item '>";
            $str.="<dt class='am-accordion-title am-text-truncate'>$row[errtitle]</dt>";
            $str.="<dd class='am-accordion-bd am-collapse'><div class='am-accordion-content am-padding-bottom-0'>";
            $str.="<ul class='am-list am-margin-bottom-0'>";
            $currerr = $row["errtitle"];
        }
        if (!empty($row["sno"])) $str.= "<li>$row[sno]</li>";
    }
    $str.= "</ul></div></dd></dl>";
    echo $str;
}

else if($_GET['action']=="answer"){
    global $conn;
    extract($_POST);
    $sql="insert into solution(sno,solutioncontent) VALUES ('$_SESSION[no]','$solutioncontent') where no='$_SESSION[no]'";
    mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "提交成功";
        return 1;
    } else {
        echo "提交失败";
        return 0;
    }
}



   $conn=null;
?>