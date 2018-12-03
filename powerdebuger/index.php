<?php
require_once "header.php";

?>

<?php
    $sql="select ename from experiment where estart='1'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
?>
<!-- content start -->
<div class=" am-container" xmlns="http://www.w3.org/1999/html">
    <div class="am-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong id="printexperiment" class="am-text-warning am-text-lg">实验名称:<?php echo $row['ename']; ?></strong>  <small></small></div>

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

                            </div><br><br>

                            <div class="" id="introduce" name="introduce">
                                <b>欢迎来到上机实验交互平台！请同学们仔细阅读以下具体操作：<br>
                                    1.同学们可以根据自己的问题，在错误标题的下拉索引中找到相关的问题，如果未能找到，请点击"我要提问"，在弹出的错误内容一栏中提交自己的具体问题内容。提交成功后，自己的问题会及时显示在右侧的界面"我的问题中"。<br>
                                    2.在界面的右侧中，同学们可以随时看到自己的问题解答情况，也可以为其他同学提供自己的答案。</b>

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



                <div  id="support" class="am-u-sm-7 am-u-md-5 am-u-lg-4">
                    <div class="am-tabs" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                            <li class="am-active"><a href="#tab1">我的问题</a></li>
                            <li><a href="#tab2">我要答疑</a></li>
                        </ul>

                        <div class="am-tabs-bd">

                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <script type="text/x-handlebars-template" class="js-modal-open" id="myquestions">
                                    {{>accordion accordionData}}
                                </script>
                            </div>

                            <div class="am-tab-panel am-fade" id="tab2"></div>
                                <script type="text/x-handlebars-template" class="js-modal-open" id="otherquestions">
                                    {{>accordion accordionData}}
                                </script>

                        </div>
                        <?php $conn=null; ?>
                    </div>

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



<?php
require_once "footer.php";
?>
<script>
var refreshmyquestion=null;
refreshmyquestion=setInterval(function(event) {

    $.ajax({
        cache: true,
        type: "get",
        url: "admin-process.php?action=myquestions",
        async: true,
        dataType: 'json',
        error: function (request) {
            alert(request);
        },
        success: function (res) {
            var $tpl = $('#myquestions'),
                tpl = $tpl.text(),
                template = Handlebars.compile(tpl),
                data = res,
                html = template(data);
            $tpl.before(html);
            if ($("#tab1 > section").length > 1) $("section:first").remove();
            $(".sno").click(function () {
                $("#_sno").val($(this).text());
                $("#_sid").val($(this).parent().attr("sid"));
                $.ajax({
                    cache: true,
                    type: "get",
                    url:"admin-process.php?action=answerfrom&sno="+$(this).text()+"&sid="+$(this).parent().attr("sid"),
                    dataType:"json",
                    async: true,
                    error: function(request) {
                        alert(request);
                    },
                    success: function(data) {

                        $("#solutionerrtitle").text(data.errtitle);
                        $("#solutioncontent").val(data.solutioncontent);
                        $("#answerfromModal").modal();

                    }
                });
                return false;
            });
            $("#evaluate").submit(function(event) {
                $.ajax({
                    cache: true,
                    type: $(this).attr("method"),
                    url:$(this).attr("action"),
                    data:$(this).serialize(),
                    async: true,//异步请求
                    error: function(request) {
                        alert(request);
                    },
                    success: function(data) {
                        $("#message2").html(data);

                    }
                });
                return false;
            });
            $('#quit').on('click', function() {
                $('#answerfromModal').modal("close");
            });

        }
    });

    $.ajax({
        cache: true,
        type: "get",
        url: "admin-process.php?action=otherquestions",
        async: true,
        error: function (request) {
            alert(request);
        },
        success: function (res) {
            $("#tab2").empty();
            $("#tab2").html(res);
            $(".othererrtitle").click(function () {
                $("#answerinModal").modal("open");
                $("#other_errtitle").text($(this).text());
                $("#rid").val($(this).attr("rid"));
                $("#message3").html(data);
            });
        }
    });

    $.AMUI.accordion.init();

    }, 3000);


$("#support").mouseleave(function(e){
    if(refreshmyquestion) return;
    refreshmyquestion=setInterval(function(event){
        $.ajax({
            cache: true,
            type: "get",
            url:"admin-process.php?action=myquestions",
            async: true,
            dataType:'json',
            error: function(request) {
                alert(request);
            },
            success: function(res) {
                var $tpl = $('#myquestions'),
                tpl = $tpl.text(),
                template = Handlebars.compile(tpl),
                data =res,
                html = template(data);
                $tpl.before(html);
                if($("#tab1 > section").length>1) $("section:first").remove();
                $(".sno").click(function () {
                    $("#_sno").val($(this).text());
                    $("#_sid").val($(this).parent().attr("sid"));
                    $.ajax({
                        cache: true,
                        type: "get",
                        url:"admin-process.php?action=answerfrom&sno="+$(this).text()+"&sid="+$(this).parent().attr("sid"),
                        dataType:"json",
                        async: true,
                        error: function(request) {
                            alert(request);
                        },
                        success: function(data) {
                            $("#solutionerrtitle").text(data.errtitle);
                            $("#solutioncontent").val(data.solutioncontent);
                            $("#answerfromModal").modal();

                        }
                    });
                    return false;
                });
                $("#evaluate").submit(function(event) {

                    $.ajax({
                        cache: true,
                        type: $(this).attr("method"),
                        url:$(this).attr("action"),
                        data:$(this).serialize(),
                        async: true,//异步请求
                        error: function(request) {
                            alert(request);
                        },
                        success: function(data) {
                            $("#message2").html(data);

                        }
                    });
                    return false;
                });
                $('#quit').on('click', function() {
                    $('#answerfromModal').modal("close");
                });
             }
        });
        $.ajax({
            cache: true,
            type: "get",
            url: "admin-process.php?action=otherquestions",
            async: true,
            error: function (request) {
                alert(request);
            },
            success: function (res) {
                $("#tab2").empty();
                $("#tab2").html(res);
                $(".othererrtitle").click(function () {
                    $("#answerinModal").modal("open");
                    $("#other_errtitle").text($(this).text());
                    $("#rid").val($(this).attr("rid"));

                });
            }
        });

        $.AMUI.accordion.init();
    }, 3000);

    $("#myanswer").submit(function(event) {
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,//异步请求
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message3").html(data);

            }
        });
        return false;
    });
    $('#giveup').on('click', function() {
        $('#answerinModal').modal("close");
    });
});


$("#support").mouseover(function(e){
    clearInterval(refreshmyquestion);
    refreshmyquestion=null;
});


</script>

<div class="am-modal am-modal-no-btn" tabindex="-1"  id="answerfromModal" name="answerfromModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>问题解答</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>


        <form method="post" class="am-form" id="evaluate" name="evaluate" action="admin-process.php?action=evaluate"  >
                <div>
                    <div class="am-align-left">
                        <b>错误标题：<span id="solutionerrtitle"></b><br>
                        <input id="_sno" name="sno" type="hidden" /><input id="_sid" name="sid" type="hidden" />
                    </div>
                        <textarea rows="4" name="solutioncontent" id="solutioncontent" readonly="true"></textarea>
                </div><br>


            <div>
                <small class="am-text-danger am-align-left" id="message2"></small>
               <div class="am-align-right">
                    <b>给个评价呗？</b>
                    <select  id=myevaluate name='myevaluate' data-am-selected="{maxHeight: 100,btnStyle: 'warning'}" >
                        <option value="很有帮助">很有帮助</option>
                        <option value="一般">一般</option>
                        <option value="没有任何帮助">没有任何帮助</option>
                    </select><br>



                </div><br><br>


                <div class="am-cf ">
                    <div>
                        <input style="width: 49%;" type="submit" id="answer_submit" value="提交评价" class="am-btn  am-btn-success am-btn-sm">

                        <input style="width: 49%;" type="reset" id="quit" value="退出" class="am-btn  am-btn-danger am-btn-sm">
                    </div><br>
                </div>

           </div>
        </form>
        </div>
    </div>
</div>



<div class="am-modal am-modal-no-btn" tabindex="-1"  id="answerinModal" name="answerinModal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>问题解答</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>


            <form method="post" class="am-form" id="myanswer" name="myanswer" action="admin-process.php?action=answerin"  >
                <div>
                    <div class="am-align-left">
                        <b>错误标题：<span id="other_errtitle"></b><br>
                        <input id="rid" name="rid" type="hidden">
                    </div>
                    <textarea rows="4" name="answercontent" id="answercontent" placeholder="快来给出你的解答吧^_^"></textarea>
                </div><br>

                <div>
                    <small class="am-text-danger am-align-left" id="message3"></small>
                    <input style="width: 48%;" type="reset" id="reanswer" value="重新解答" class="am-btn am-align-right am-btn-warning am-btn-sm">

                </div><br><br>

                    <div class="am-cf">
                        <div>
                            <input style="width: 48%;" type="submit" id="answer_submit" value="提交解答" class="am-btn  am-btn-success am-btn-sm">

                            <input style="width: 48%;" type="reset" id="giveup" value="退出" class="am-btn  am-btn-danger am-btn-sm">
                        </div><br>
                    </div>

            </form>
        </div>
    </div>
</div>