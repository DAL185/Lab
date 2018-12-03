<html lang="en">

<head>
    <title>班级管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<?php
require_once "header.php";
?>


<?php
$_GET['action'] == "student_search";
$student_info = $_GET['student_info'];
if(empty($student_info)) {
    $sql = "select *  from manageclass";
    $res = mysqli_query($conn,$sql);
}else {
    $student_info = $_GET['student_info'];
    $sql = "select *  from manageclass where mno='$student_info'or mname='$student_info'or mcollege='$student_info'";
    $res = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("mno" => 0));
    }
}
?>


<div class="am-u-sm-5 am-u-md-4 am-u-lg-3">
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="teachermain.php" ><span id="teachermain" class="am-icon-safari"></span>教师须知</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span>安排教学计划<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li class="admin-parent">
                            <a id="labmanage" class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-file"></span>实验管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                            <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav1">
                                <li><a href="labplan.php" ><span id='labplan' class="am-icon-bug"></span>实验计划</a></li>
                                <li><a href="labguide.php" ><span id='labguide' class="am-icon-bug"></span>实验指导</a></li>
                            </ul>
                        </li>
                        <li><a href="manageclass.php" ><span id="classmanage" class="am-icon-bug"></span>班级管理</a></li>
                        <li><a href="#" ><span id="personaldata" class="am-icon-bug"></span>个人信息</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="am-u-sm-7 am-u-md-8 am-u-lg-9">
    <div class="am-g am-g-fixed">
        <div>
            <form method="post" id="searchstudent" name="searchstudent" class="form am-align-right" action="admin-teacher_usermain.php?action=student_search">
                <div class="formFiled clearfix">
                    <input type="text" id="checkstudentinfo" name="checkstudentinfo"  class="inputText search" placeholder="输入要查找学生的信息" />
                    <input id="checkstudent" name="checkstudent" checkstudent type="button" class="am-btn-success"  value="查找"/>
                </div>
            </form>
            <button id='addstudent' name="addstudent" class="am-align-right am-btn am-btn-primary">添加学生信息</button>
        </div>
        <table id='table' class="am-table am-margin-top-lg am-table-bordered">

            <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年级</th>
                <th>专业</th>
                <th>备注</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row=mysqli_fetch_array($res)){
            ?>

            <tr>
                <td class="check_mno"><?php echo $row['mno'] ?></td>
            <td class="check_mname"><?php echo $row['mname'] ?></td>
            <td class="check_msex"><?php echo $row['msex'] ?></td>
            <td class="check_mgrade"><?php echo $row['mgrade'] ?></td>
            <td class="check_mcollege"><?php echo $row['mcollege'] ?></td>
            <td class="check_mremark"><?php echo $row['mremark'] ?></td>

            <td>
                <button class="modifystudent am-text-success" id="modifystudent" t_mno="<?php echo $row['mno'] ?>" name="modifystudent">修改信息</button>&nbsp;&nbsp;
                <button class="cancelstudent am-text-danger"  c_mno="<?php echo $row['mno'] ?>"   name="cancelstudent">删除</button>
            </td>
            </tr>

            <?php } ?>
            </tbody>



        </table>
    </div>
</div>

<script type="text/javascript">
    /*$(function(){
        $('#checkstudent').click(function(){
            var studenttxt=$('#checkstudentinfo').val();
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-teacher_usermain.php?action=student_search&student_info="+$("#c_content").text(),
                dataType:"json",
                async: true,
                error: function(request) {
                    alert(request);
                },
                success: function(data) {

                    $("#check_mno").val(data.check_mno);
                    $("#check_mame").val(data.check_mame);
                    $("#check_msex").val(data.check_msex);
                    $("#check_mgrade").val(data.check_mgrade);
                    $("#check_mcollege").val(data.check_mcollege);
                    $("#check_mremark").val(data.check_mremark);
            $("table tbody tr")
                .hide()
                .filter(":contains('"+studenttxt+"')")
                .show();
        })

    })*/
</script>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="addstudentModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>学生基本信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="student_submit" name="student_submit" action="admin-teacher_usermain.php?action=student_submit" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="mno" id="mno" placeholder='学号'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="mname" id="mname" placeholder='姓名'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="msex" id="msex" placeholder='性别'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="mgrade" id="mgrade" placeholder='年级'>
                </div><br>

                <div class="am-input-group am-input-group-default">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-get-pocket"></i></span>
                    <input type="text" class="am-form-field" name="mcollege" id="mcollege" placeholder='专业'>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="mremark" id="mremark" placeholder='备注'>
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message8"></small>
                </div>
                <div class="am-left">
                    <p>附：请老师们根据自己的教学计划仔细制定课程安排</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="addstudentinfo" value="添加信息" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="canceladdstudentinfo" value="取消添加" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="modifystudentModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>学生基本信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="student_update" name="student_update" action="admin-teacher_usermain.php?action=student_update" >
                <input type="hidden" class="mno1" name="mno1">
                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="mno am-form-field" name="mno" id="mno" placeholder='学号'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="mname am-form-field" name="mname" id="mname" placeholder='姓名'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="msex am-form-field" name="msex" id="msex" placeholder='性别'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="mgrade am-form-field" name="mgrade" id="mgrade" placeholder='年级'>
                </div><br>

                <div class="am-input-group am-input-group-default">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-get-pocket"></i></span>
                    <input type="text" class="mcollege am-form-field" name="mcollege" id="mcollege" placeholder='专业'>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="mremark am-form-field" name="mremark" id="mremark" placeholder='备注'>
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message9"></small>
                </div>
                <div class="am-left">
                    <p>附：请老师们根据自己的教学计划仔细制定课程安排</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="modifystudentinfo" value="修改信息" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancelmodifystudentinfo" value="取消修改" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="am-modal am-modal-alert" tabindex="-1" id="confirmdeletestudent">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>删除学生信息</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            确定要删除学生[<span id="_delmno"></span>]吗？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message10"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" id="deletethisstudent"  value="确定" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" id="canceldeletethisstudent" value="取消" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>



<div class="am-modal am-modal-alert" tabindex="-1" id="nostudentModal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>该学生不存在！</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            请仔细核对学生信息再进行查找
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message10"></small>
        </div>
    </div>
</div>

<?php
$conn=null;
?>
<?php
require_once "footer.php";
?>

</html>