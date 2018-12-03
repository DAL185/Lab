<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>欢迎来到上机实验交互平台</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="UBei" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body style="overflow-y:scroll;">
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<!-- permission check start   -->
<?php
    require_once "config.php";
?>

<!-- permission check end   -->


<header class="am-topbar am-topbar-fixed-top" id="top" name="top" >
    <div class=" am-container">
        <h1 class="am-topbar-brand ">
            <a href="." class="am-text-xl "><span class="am-text-primary">欢迎来到上机实验交互平台</span></span></a><!--<img src="images/logo1.png" height="50"/>-->
        </h1>
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-left admin-header-list">
            </ul>
            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">










                            <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-users am-text-warning""></span>
                        <?php echo $_SESSION['name'];?>
                        <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <?php if($_SESSION['name']) { ?>
                        <li>
                                <span type="button" id="modalopen" class="am-btn  am-icon-align-center am-btn-success js-modal-open" >资料</span>
                        </li>

                            <li><a href="admin-userman.php?action=logout"><span class="am-icon-power-off"></span>退出</a></li>
                        <?php }else{ ?>
                            <li><a href="admin/admin-login.php"> <span class="am-icon-power-off"></span>登录</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
            </ul>
        </div>
    </div>
</header>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="studnetmainModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>个人基本信息</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="update" name="update" action="admin-userman.php?action=update " >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="school" id="school" value='<?php echo $row['school']; ?> '>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="name" id="name" value='<?php echo $row['name']; ?>' >
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="no" id="no" value='<?php echo $row['no']; ?>' >
                </div><br>
                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-television"></i></span>
                    <input type="text" class="am-form-field" name="major" id="major" value='<?php echo $row['major']; ?>' >
                </div><br>
                <div>
                    <small class="am-text-danger am-align-left" id="message"></small>
                </div>
                <div class="am-left">
                    <p>附：若个人信息与本人不符,可直接在个人信息栏中修改</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="ssubmit" value="修改" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel" value="取消" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

