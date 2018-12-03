<?php
require_once "header.php";
?>
<?php
    require_once "config.php";
?>
<!doctype html>
<html class="no-js">
<body>
<?php
    if($_GET['action']=='mylesson') {
        global $conn;
        $lclass=$_GET['myclass'];
        $sql = "select * from lesson where lclass='$lclass'";
        $res = mysqli_query($conn, $sql);

?>
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">

            <ul class="am-list admin-sidebar-list">
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 选择课程<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <?php while($row=mysqli_fetch_array($res)){ ?>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li><a href="index.php" class="am-icon-bug"><?php echo $row['lname']; ?></a></li>
                    </ul>
                    <?php }} ?>
                </li>
                </ul>

        </div>
    </div>


</body>
    <?php
        require_once "footer.php";
    ?>


</html>

