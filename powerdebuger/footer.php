<footer class="footer am-text-center am-topbar-fixed-bottom">

    <p class="am-padding-left">© 2016 辽宁师范大学管理工程开放实验室.</p>
</footer>


</body>
</html>




<script src="assets/js/handlebars.min.js"></script>
<script src="assets/js/amazeui.widgets.helper.min.js"></script>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>

<script>
    //存在性检查

    $("#no").change(function(event) {
        if($("#login").hasClass("am-text-warning")) {
            return false;
        }
        $.ajax({
            cache: true,
            type:"get",
            url:"admin-userman.php?action=existCheck&no="+$(this).val().trim(),
            async: false,
            error: function(request){
                alert("连接失败");
            },
            success: function(data) {
                if(data=="存在"){
                    $("#tip").html("该学号/教师号已注册");
                    $("#submitbtn").attr("disabled","disabled");
                }else{
                    $("#tip").empty();
                    $("#submitbtn").removeAttr("disabled");
                }
            }
        });
        return false;
    });

    $("#reg").click(function(event) {
        $(".reg_other").removeClass("am-hide");
        $(this).addClass("am-text-warning");
        $("#login").removeClass("am-text-warning");
        //$("#submitbtn").attr("disabled","disabled");
    });

    $("#login").click(function(event) {
        $(this).addClass("am-text-warning");
        $("#reg").removeClass("am-text-warning");
        $(".reg_other").addClass("am-hide");
        $("#submitbtn").removeAttr("disabled");
    });
    $("#password1").change(function(event) {
        if($(this).val()==$("#password").val()) {
            $("#tip").html("");
        }else{
            $("#tip").html("<font color=red>两次密码不同</font>");
            $(this).val("");
            $("#password").val("");
        }
    });
    $("#question").click(function(event){
      $("#errcontent").removeClass("am-hide");
    });



    $("#loginform").submit(function(event) {
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            dataType:"json",
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if((data.flag=="注册成功")||(data.flag=="登录成功")){
                    if(data.role=="学生") {
                        location.href = "studentmain.php";

                    }else{
                        location.href = "teachermain.php";
                    }
                } else{
                    $("#submit").html("<font color=red>"+data+"</font>");
                }
            }
        });
        return false;
    });

    $("#submit").on('click',function(){           //删除该课程
        $.ajax({
            cache: true,
            type:"get",
            url:"studentmain.php?action=mylesson&myclass="+$("#class").val(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                return 1;
            }
        });
        return false;
    });

     $('#modalopen').on('click', function(e) {
         var id="string";
         $.ajax({
             cache: true,
             type: "get",
             url:"admin-userman.php?action=userinfo&no=<?php if(isset($_SESSION['no']))echo $_SESSION['no']?>",
             dataType:"json",
             async: true,
             error: function(request) {
                 alert(request);
             },
             success: function(data) {

                 $("#school").val(data.school);
                 $("#name").val(data.name);
                 $("#no").val(data.no);
                 $("#major").val(data.major);

                 if(data.no!="0") $("#studnetmainModal").modal();
             }
         });
         //$("#studnetmainModal").modal();
         return false;
     });



    $('#myanswer').on('click', function(e) {
        $.ajax({
            cache: true,
            type: "get",
            url:"admin-process.php?action=myanswer",
            dataType:"json",
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#solutioncontent").val(data.solutioncontent);


                if(data.no!="0") $("#answernameModal").modal();
            }
        });
        //$("#studnetmainModal").modal();
        return false;
    });


    $('#cancel').on('click', function() {
        $('#studnetmainModal').modal("close");
    });




    $("#update").submit(function(event) {
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message").html(data);
            }
        });
        return false;
    });



    $('#nextpage').on('click', function() {
        $('#errcontent').removeClass();
        $('#introduce').addClass("err_hid am-hide");
    });

    /*$('#errorcontent').on('click', function() {
        $('#buser-check').modal("open");
    });*/


    $("#err_submit").submit(function(event) {
        $.ajax({
            cache: true,
            type: $("#err_submit").attr("method"),
            url:$("#err_submit").attr("action"),
            data:$("#err_submit").serialize(),
            async: true,//异步请求
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message1").html(data);

            }
        });
        return false;
    });
</script>


<script>
    $('#addclass').on('click',function(){   //添加课程
        $('#addclassModal').modal();
    });


    $("#class_submit").submit(function(event) {   //提交课程的添加
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
               $("#message4").html(data);
            }
        });
        return false;
    });

    $('#cancelclass').on('click', function() {      //课程添加模态窗口关闭
        $('#addclassModal').modal("close");
    });

    $('.modifyclass').on('click',function() {        //修改(this).attr("lno"));
        $("#class_update .lname").val($(this).parent().parent().find('td').eq(0).text());//此处是从客户端直接返回数据，因为modifyclass的parent是td，所以还要加上一个parent才表示tr，此外，模态窗口里的是表单，要输入数据，所以返回val
        $("#class_update .lclass").val($(this).parent().parent().find('td').eq(1).text());
        $("#class_update .ltime").val($(this).parent().parent().find('td').eq(2).text());
        $("#class_update .lno1").val($(this).attr("m_lno"));
        $('#modifyclassModal').modal();
    });





    $("#class_update").submit(function(event) {   //修改课程
        //$('#modifyclassModal').modal("close");
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message5").html(data);
            }
        });
        return false;
    });

    $('#cancelalter').on('click', function() {      //修改课程模态窗口关闭
        $("#modifyclassModal").modal("close");
    });

    $('#deleteclass').on('click',function(){           //删除该课程

        $.ajax({
            cache: true,
            url:"admin-teacher_usermain.php?action=class_delete&_lno="+$("#_dellno").text(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="删除成功") $('#confirmdelete').modal("close");
                $("#message6").html(data);
            }
        });
        return false;
    });

    $('#canceldelete').on('click', function() {         //取消删除该课程
        $('#confirmdelete').modal("close");
    });

    $(".addlab").on('click',function() {
        $("#experiment_submit .lno2").val($(this).attr("a_lno"));
        $("#experimentModal").modal();
    });

    $("#experiment_submit").submit(function(event) {   //提交课程的添加
            $.ajax({
                cache: true,
                type: $(this).attr("method"),
                url:$(this).attr("action"),
                data:$(this).serialize(),
                async: true,
                error: function(request) {
                    alert(request);
                },
                success: function(data) {
                    $("#message7").html(data);
                }
            });
            return false;
        });

    $(".delete_class").on('click',function(){    //打开确认删除模态窗口
        $("#confirmdelete").modal();
        $("#_dellno").text($(this).attr("d_lno"));
    });

    $(".eachexperiment").change(function(event){               //弹出实验模态窗口，返回实验信息
        //$("#experiment_update .eno").val($(this).val());
        $.ajax({
            cache:true,
            type:"get",
            url:"admin-teacher_usermain.php?action=start_experiment&eno1="+$(this).val(),
            dataType:"json",
            async:true,
            error: function(request){
                alert(request);
            },
            success:function(data){
                $("#each_name").val(data.ename);     //注意：val(data.ename)中的ename是从后端传过来的，要跟后端的变量保持一致
                $("#each_spot").val(data.espot);
                $("#each_time").val(data.etime);
                $("#each_aim").val(data.eaim);
                $("#each_content").val(data.econtent);
                $("#each_surrounding").val(data.esurrounding);
                    if(data.eno!= '0')   $("#eachexperimentModal").modal();
            }
        });
        return false;
    });

    $("#experiment_update").submit(function(event) {   //修改实验信息，启动实验，保存实验

        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message12").html(data);
            }
        });
        return false;
    });

    $('#addstudent').on('click',function(){   //添加课程
        $('#addstudentModal').modal();
    });


    $("#student_submit").submit(function(event) {   //提交学生信息的添加
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message8").html(data);
            }
        });
        return false;
    });

    $(".modifystudent").on('click',function(){              //修改学生信息模态窗口弹出，返回学生基本信息
        $("#student_update .mno1").val($(this).attr("t_mno"));
        $("#student_update .mno").val($(this).parent().parent().find('td').eq(0).text());
        $("#student_update .mname").val($(this).parent().parent().find('td').eq(1).text());
        $("#student_update .msex").val($(this).parent().parent().find('td').eq(2).text());
        $("#student_update .mgrade").val($(this).parent().parent().find('td').eq(3).text());
        $("#student_update .mcollege").val($(this).parent().parent().find('td').eq(4).text());
        $("#student_update .mremark").val($(this).parent().parent().find('td').eq(5).text());
        $("#modifystudentModal").modal();
    });

    $("#student_update").submit(function(event){        //修改学生信息
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message9").html(data);
            }

        });
        return false;
    });

    $(".cancelstudent").on('click',function(){          //删除学生信息，模态窗口弹出
        $("#confirmdeletestudent").modal();
        $("#_delmno").text($(this).attr("c_mno"));
    });
    $("#deletethisstudent").on('click',function(){      //确认删除学生信息
        $.ajax({
            cache:true,
            type:"get",
            url:"admin-teacher_usermain.php?action=student_delete&mno2="+$("#_delmno").text(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message10").html(data);
            }
        });
        return false;
    });

$("#checkstudent").on('click',function(){
    //$("#c_content").text($(this).attr("checkstudentinfo"));
    $.ajax({
        cache: true,
        type: "get",
        url:"manageclass.php?action=student_search&student_info="+$("#checkstudentinfo").val(),
        dataType:"json",
        async: true,
        error: function(request) {
            alert(request);
        },
        success: function(data) {

            $(".check_mno").val(data.mno);
            $(".check_mname").val(data.mname);
            $(".check_msex").val(data.msex);
            $(".check_mgrade").val(data.mgrade);
            $(".check_mcollege").val(data.mcollege);
            $(".check_mremark").val(data.mremark);
        }
    });
    return false;
});


    $("#personaldata").on('click',function(){
       document.getElementById("#modalopen").click();
    });
</script>
