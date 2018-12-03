<html lang="en">

<head>
    <title>实验管理</title>
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

<?php
    $sql="select *  from lesson";
    $res=mysqli_query($conn,$sql);
?>

<div id="tab3" class="am-u-sm-7 am-u-md-8 am-u-lg-9">
    <div class="am-g am-g-fixed">
        <div>
            <button id='addclass' name="addclass" class="addclass am-align-right am-btn am-btn-primary">增加课程</button>
        </div>
        <table id='table' class="am-table am-margin-top-lg am-table-bordered">

            <thead>
                <tr>
                    <th>课程名称</th>
                    <th>上课班级</th>
                    <th>授课时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <?php
            while($row=mysqli_fetch_array($res)){
            ?>
            <tbody>

                <tr >

                    <td><?php echo $row['lname'] ?></td>
                    <td><?php echo $row['lclass'] ?></td>
                    <td><?php echo $row['ltime'] ?></td>



                    <td>

                        <select  data-am-selected="{searchBox: 1}" placeholder="实验项目" class="eachexperiment"   >
                            <option selected value=""></option>
                            <?php
                            $sql="select * from experiment WHERE lno= $row[lno]";
                            $result=mysqli_query($conn,$sql);
                             while($row0=mysqli_fetch_array($result)){
                                ?>


                            <option value="<?php echo $row0['eno'] ?>"><?php echo $row0['ename'] ?></option>
                            <?php } ?>
                        </select>
                        &nbsp;&nbsp;

                        <button class="addlab am-text-primary" id="addlab" a_lno="<?php echo $row['lno'] ?>" name="addlab">添加实验</button>&nbsp;&nbsp;
                        <button class="modifyclass am-text-success" id="modifyclass" m_lno="<?php echo $row['lno'] ?>" name="modifyclass">修改课程</button>&nbsp;&nbsp;
                        <button class="delete_class am-text-danger"  d_lno="<?php echo $row['lno'] ?>"   name="delete_class">删除课程</button>
                    </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<div class="am-modal am-modal-no-btn" tabindex="-1" id="addclassModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>课程信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="class_submit" name="class_submit" action="admin-teacher_usermain.php?action=class_submit" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="lname" id="lname" placeholder='课程名称'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="lclass" id="lclass" placeholder='上课班级'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="ltime" id="ltime" placeholder='授课时间'>
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message4"></small>
                </div>
                <div class="am-left">
                    <p>附：请老师们根据自己的教学计划仔细制定课程安排</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="planclass" value="制定课程" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancelclass" value="取消制定" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="am-modal am-modal-no-btn" tabindex="-1" id="modifyclassModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>课程信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="class_update"  action="admin-teacher_usermain.php?action=class_update" >
                <input class="lno1" name="lno1" type="hidden">
                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="lname am-form-field"  name="lname" >
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="lclass am-form-field" name="lclass" >
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="ltime am-form-field" name="ltime" >
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message5"></small>
                </div>
                <div class="am-left">
                    <p>附：请老师们根据自己的教学计划仔细制定课程安排</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="alterclass" value="修改课程" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancelalter" value="取消修改" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="am-modal am-modal-alert" tabindex="-1" id="confirmdelete">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>删除课程</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
           确定要删除课程[<span id="_dellno"></span>]吗？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message6"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" id="deleteclass"  value="确定" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" id="canceldelete" value="取消" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>


<div class="am-modal am-modal-no-btn" tabindex="-1" id="experimentModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>实验信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            <form method="post" class="am-form" id="experiment_submit" name="experiment_submit" action="admin-teacher_usermain.php?action=experiment_submit" >
                <input type="hidden" name="lno2" class="lno2">
                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <textarea rows="4" class="am-form-field" name="ename" id="ename" placeholder="实验名称"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <textarea rows="4" class="am-form-field" name="espot" id="espot" placeholder="实验室"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <textarea rows="4" class="am-form-field" name="etime" id="etime" placeholder="实验时间"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-get-pocket"></i></span>
                    <textarea rows="4" class="am-form-field" name="eaim" id="eaim" placeholder="实验目的"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-default">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-gg"></i></span>
                    <textarea rows="4" class="am-form-field" name="econtent" id="econtent" placeholder="实验内容及要求"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <textarea rows="4" class="am-form-field" name="esurrounding" id="esurrounding" placeholder="实验环境"></textarea>
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message7"></small>
                </div>
                <div class="am-left">
                    <p>附：请老师们根据自己的教学计划仔细制定实验安排</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="addexperiment" value="添加实验" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="canceladd" value="取消添加" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<div class="am-modal am-modal-no-btn" tabindex="-1" id="eachexperimentModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>实验信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">

            <form method="post" class="am-form" id="experiment_update" name="experiment_update" action="admin-teacher_usermain.php?action=experiment_update" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="hidden" class="eno" id="eno" name="eno">
                    <textarea rows="4" class="am-form-field" name="each_name" id="each_name" value="<?php echo $row['ename']; ?>"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <textarea rows="4" class="am-form-field" name="each_spot" id="each_spot" value="<?php echo $row['espot']; ?>"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <textarea rows="4" class="am-form-field" name="each_time" id="each_time" value="<?php echo $row['etime']; ?>"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-get-pocket"></i></span>
                    <textarea rows="4" class="am-form-field" name="each_aim" id="each_aim" value="<?php echo $row['eaim']; ?>"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-default">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-gg"></i></span>
                    <textarea rows="4" class="am-form-field" name="each_content" id="each_content" value="<?php echo $row['econtent']; ?>"></textarea>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <textarea rows="4" class="am-form-field" name="each_surrounding" id="each_surrounding" value="<?php echo $row['esurrounding']; ?>"></textarea>
                </div><br>
                <div>
                    <div class="am-btn-group">
                        <label class="am-radio-inline  am-btn am-btn-success am-btn-xs am-icon-users" ><input type="radio" value="1" name="estart" id="estart">开始实验</label>
                        <label class="am-radio-inline  am-btn am-btn-default am-btn-xs am-icon-shield" ><input type="radio" value="0" name="estart" id="estart" checked>停止实验</label>

                        <small class="am-text-danger am-align-left" id="message12"></small>
                    </div>
                </div><br>


                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="saveexperiment" value="保存实验" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="nosaveexperiment" value="退出" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>



<?php
require_once "footer.php";
?>

</html>