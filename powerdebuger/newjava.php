<?php
require_once "header.php";
$sql="select * from lesson";
$res=mysqli_query($conn,$sql);
?>

<!-- content start -->
<div class=" am-container">
    <div class="am-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div
                    class="am-fl am-cf"><strong class="am-text-primary am-text-lg">JAVA</strong></small></small></div>

            </div>

            <?php
            $sql="SELECT errtitle FROM helprecord WHERE errtitle=errtitle And 'recid' like '0_' ORDER BY errtitle,recid DESC LIMIT 5";
            $res=mysqli_query($conn,$sql);

            ?>


            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-5">
                    <div class="am-padding" id="">
                        <form class="am-form " name="nextpage" id="nextpage">
                            <div class="am-margin-top-sm">
                                <div class="">
                                    <b>错误标题:</b>
                                    <br/>
                                    <br/>
                                </div>
                                <div class="" id="errtitle">
                                    <textarea rows="2"></textarea>
                                </div>
                            </div>


                            <div class=" am-margin-top-sm">
                                <div class="am-hide" id="errcontent" name="errcontent">
                                    <div class="">
                                        <b>错误内容:</b>
                                    </div>
                                    <div class="">
                                        <textarea rows="8"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br/>
                        <button type="button" class="am-btn am-btn-primary am-btn-xs" a href="index2.php">错误提交</button>
                        <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃提交</button>
                    </div>
                </div>

                <?php
                $sql="SELECT errtitle,errtype FROM helprecord ORDER BY effectval,clickcnt DESC LIMIT 5";
                $res=mysqli_query($conn,$sql);

                //echo intval((time()-$rowres["sregtime"])/86400);
                ?>

                <div class="am-u-sm-12 am-u-md-7">
                    <div class="am-padding-top"><b>常见错误：</b></div>
                    <form class="am-form">
                        <table class="am-table am-table-striped  table-main">
                            <thead>
                            <tr>
                                <th class="table-title">错误标题</th><th class="table-type">错误类型</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            while($row=mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><div id="<?php echo $row['errtitle'] ?>">
                                            <?php
                                            echo $row['errtitle'];
                                            ?>
                                        </div>
                                    </td>
                                    <td><div id="<?php echo $row['errtitle'] ?>">
                                            <?php
                                            echo $row['errtype'];
                                            ?>
                                        </div>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                            </tbody>
                            <?php
                            $conn=null;
                            //function strcon($conn,$sql){
                            // return mysqli_query($conn,$sql);
                            //}
                            ?>
                        </table>
                        <div class="am-cf">
                            共 5 条记录
                            <div class="am-fr">
                                <ul class="am-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr />
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>
<!-- content end -->
<?php
require_once "footer.php";
?>

<div class="am-popup " id="buser-check">
    <div class="am-popup-inner">
        <div class="am-popup-bd" >

            <h3 class="am-popup-title" >错误解决信息
                <span data-am-modal-close
                      class="am-close am-fr" >&times;</span></h3>
            <table id="institution_info" class="am-table am-table-striped am-table-hover table-main">
                <tbody>
                </tbody>
            </table>


            <hr/>
            <div class="am-modal-footer am-topbar-fixed-bottom am-text-default">
                <span class="am-modal-btn am-btn-default  " id="deny" data-am-modal-cancel >退回修改</span>
                <span class="am-modal-btn am-btn-default " id="accept" data-am-modal-confirm>通过审核</span>
            </div>
        </div>
    </div>
</div>



<script>
    $('#nextpage').on('click', function() {
        $('#errcontent').removeClass();
    });
    var error=$(this).attr('id');
    $('#error').on('click', function() {
        $('#buser-check').modal("open");
    });
</script>