<?php
require_once "header.php";

?>

<!-- content start -->
<div class=" am-container" xmlns="http://www.w3.org/1999/html">
    <div class="am-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-warning am-text-lg">课程名称: JAVA实验3.3</strong> / <small></small></div>

            </div>



            <div class="am-g">
                <div class="am-u-sm-5 am-u-md-7 am-u-lg-8">
                    <div class="am-padding" id="">
                        <form class="am-form" name="err_submit" id="err_submit" action="admin-process.php?action=submit" method="post" >
                            <div class="am-margin-top-sm">
                                <div class="">
                                    <b>错误标题:</b><br/><br/>
                                </div>

                                <div>
                                    <textarea class="" rows="2" name="errtitle" id="errtitle"></textarea>
                                </div><br>
                                <button type="button" id="question" name="question" class="am-btn am-btn-primary am-align-right am-btn-xs" >我要提问</button>

                            </div>

                            <div class=" am-margin-top-sm err_hide am-hide" id="errcontent" name="errcontent">

                                    <div class="">
                                        <b>错误内容:</b>
                                    </div>
                                    <div class="">
                                        <textarea rows="8" name="errorcontent" id="errorcontent"></textarea>
                                    </div>


                            <br/>
                                <p id="js-do-actions">
                                <button type="submit"  class="am-btn am-btn-primary am-btn-xs data-insert" >错误提交</button>
                            <small class="am-text-danger am-align-right" id="message1"> </small>
                            </div>
                        </form>
                    </div>
                </div>




                <?php
                $sql="SELECT distinct h.errtitle,s.sno FROM helprecord h LEFT JOIN  solution s ON h.recid=s.recid ORDER BY h.recid DESC LIMIT 10";
                $res=mysqli_query($conn,$sql);

                ?>

                <div class="am-u-sm-7 am-u-md-5 am-u-lg-4">
                    <div class="am-tabs" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                            <li class="am-active"><a href="#tab1">我的问题</a></li>
                            <li><a href="#tab2">我要答疑</a></li>
                        </ul>

                        <div class="am-tabs-bd">

                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <section data-am-widget="accordion" id="myquestions" class="am-accordion am-accordion-basic" data-am-accordion='{  }'>
                                <?php
                                $currerr="";
                                while($row=mysqli_fetch_array($res)){
                                if ($currerr <> $row["errtitle"]){
                                if (!empty($currerr)) echo "</ul></div></dd></dl>";
                                ?>
                                    <dl class="am-accordion-item ">
                                        <dt class="am-accordion-title am-text-truncate">
                                            <?php echo $row["errtitle"] ?>
                                        </dt>
                                        <dd class="am-accordion-bd am-collapse ">
                                            <div class="am-accordion-content am-padding-bottom-0">
                                                <ul class="am-list am-margin-bottom-0">
                                                    <?php
                                                    $currerr = $row["errtitle"];
                                                    }
                                                    if (!empty($row["sno"])) echo "<li>$row[sno]</li>";
                                }
                                echo "</ul></div></dd></dl>";
                                ?>
                                </section>
                            </div>


                            <?php
                               while($row=mysqli_fetch_array($res)){
                            ?>
                            <div class="am-tab-panel am-fade" id="tab2">
                                <b>错误标题</b><br>
                                <tr>
                                    <td>
                                        <div class="am-panel-bd js-modal-open" id="myanswer">
                                        <?php
                                            echo $row['errtitle'];
                                         ?>
                                        </div>
                                    </td>
                                </tr>

                            </div>
                            <?php }?>
                        </div>
                        <?php $conn=null; ?>
                    </div>





                        <div class="am-cf am-hide">
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

<div class="am-modal am-modal-no-btn" tabindex="-1"  id="answernameModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>问题解答</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="answerstudent" name="answerstudent" action="admin-process.php?action=answer" >
                <div>
                    <textarea class="" rows="4" name="solutioncontent" id="solutioncontent"></textarea>
                </div><br>
            </form>


            <div class="" id="err_status" name="err_status">
            <div style="width:40%;" class="am-align-left">
                <select data-am-selected="{maxHeight: 100,searchBox: 1,  btnStyle: 'secondary'}" >
                    <option value="g">格式错误</option>
                    <option value="y">语法错误</option>
                    <option value="q">缺少字符</option>
                    <option value="l">逻辑错误</option>
                    <option value="j">技术错误</option>
                    <option value="b">编译错误</option>
                    <option value="x">系统错误</option>
                </select>

            </div>

            <div>
                <b>错误级别:</b>
                <select data-am-selected="{maxHeight: 100,btnStyle: 'warning'}" >
                    <option value="1">一级错误</option>
                    <option value="2">二级错误</option>
                    <option value="3">三级错误</option>
                </select><br>
                <div>
                    <small class="am-text-danger am-align-left" id="message2"></small>
                </div>
            </div><br><br>


                <div class="am-cf">
                    <div>
                        <input style="width: 49%;" type="submit" id="answer_submit" value="提交" class="am-btn  am-btn-success am-btn-sm">

                        <input style="width: 49%;" type="reset" id="quit" value="退出" class="am-btn  am-btn-danger am-btn-sm">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once "footer.php";
?>
    <script src="/js/jquery-1.3.2.min.js" type="text/javascript"></script>
