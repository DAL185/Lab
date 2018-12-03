<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Online Interaction Platform上机实验交互平台</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
  <style>
    .header {
    text-align: center;
    }
    .header h1 {
    font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
    font-size: 14px;
    }
  </style>
</head>
<body style="overflow:auto">
<div class="header">
  <div class="am-g">
    <h1>上机实验交互平台</h1>
    <p> Online Interaction Platform<br/>教学资源共享，信息实时交互</p>
  </div>
  <hr />
</div>


<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3><span id="login" class="am-text-warning">登录</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span id="reg">注册</span></h3>
    <hr>

      <form method="post" class="am-form" id="loginform" action="admin-userman.php?action=login" >



          <label for="tip">学号/教师号:</label><small id="tip" class="am-text-primary am-text-sm reg_other am-hide"></small>
          <input type="text" name="no" id="no" placeholder="请输入您的学号/教师号" value="" required="">
          <br>

          <label for="password">密码:</label>
          <input type="password" name="password" id="password" placeholder="请输入您的密码" value="" required="">
          <br>

          <div class="am-btn-group">
              <label class="  am-radio-inline  am-btn am-btn-secondary am-btn-xs am-icon-users" ><input type="radio" value="学生" name="roles" id="roles"> 学生</label>
              <label class="  am-radio-inline  am-btn am-btn-success am-btn-xs am-icon-shield" ><input type="radio" value="老师" name="roles" id="roles" checked> 老师</label>
          </div><br>







              <div  class="reg_other am-hide">
                  <label for="password1">再输一次密码:</label>
                  <input type="password" name="password1" id="password1" placeholder="请再输入一次您的密码" value=""><span id="tip"></span>
                  <br>
              </div>

              <div  class="reg_other am-hide">
                      <label for="name">姓名:</label>
                      <input type="text" name="name" id="name" placeholder="请输入您的真实姓名" value=""><span id="tip"></span>
                      <br>
              </div>

              <div  class="reg_other am-hide">
                  <label for="school">学校:</label>
                  <input type="text" name="school" id="school" placeholder="请输入您所在的学校" value=""><span id="tip"></span>
                  <br>
              </div>

              <div  class="reg_other am-hide">
                  <label for="major">专业:</label>
                  <input type="text" name="major" id="major" placeholder="请输入您所在的专业全称" value=""><span id="tip"></span>
                  <br>
              </div>

              <div  class="reg_other am-hide">
                  <label for="class">班级:</label>
                  <input type="text" name="class" id="class" placeholder="请按照'年级+专业'的格式填写所在班级(如2014信管1班)" value=""><span id="tip"></span>
                  <br>
              </div>



          <label for="remember-me " class="am-hide">
            <input id="remember-me" type="checkbox">
             记住密码
          </label>

          <br/>
          <div class="am-cf">
                <input type="submit" id="submitbtn" value="提交" class="am-btn am-btn-primary am-btn-sm am-fl"> <span id="submit"></span>
                <small class="am-text-danger am-align-right am-hide" id="message">提交成功 </small>

          </div>
    </form>
    <hr>

  </div>
</div>

<?php
require_once "footer.php";
?>

