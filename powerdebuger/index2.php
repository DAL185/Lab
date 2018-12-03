<?php
require_once "header.php";
?><br>

<!-- content start -->
<div class=" am-container">
    <div class="am-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">课程名称: JAVA实验3.3</strong>
                </div><br><br>
                  <table class="am-table am-table-bordered">
                      <thead>
                        <tr>
                            <th>学生姓名</th>
                            <th>学号</th>
                            <th>错误标题</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>David</td>
                            <td>555</td>
                            <td id="errtitle">格式错误</td>
                        </tr>
                        <tr>
                            <td>Komoron</td>
                            <td>444</td>
                            <td>代码错误</td>
                        </tr>
                      </tbody>
                   </table>
                  </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "footer.php";
?>
<button
    type="button"
    class="am-btn am-btn-success"
    id="solution">
</button>
<div class="am-modal am-modal-solution" tabindex="-1" id="solution">
    <div class="am-modal-dialog">
        25
            <div class="am-modal-bd">
        </div>
    </div>

</div>


<script>
    $('#errtitle').on('click', function() {
        $('#solution').modal("open");
    });
</script>
